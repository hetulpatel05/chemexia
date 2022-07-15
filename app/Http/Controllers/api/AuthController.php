<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Mail;
use JWTAuth;
use Hash;


use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $validator =Validator::make($request->all(),
            [
                'username' => 'required',
                'password' => 'required',
            ]);
        if($validator->fails())
        {
            return response()->json([ 'result' => 0, 'message' => 'Validation Error', 'errors' => $validator->errors()->messages()]);
        }

        $login_type = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) 
        ? 'email'
        : 'gstno';       

        $user = User::where($login_type, '=', $request->username)->first();

        if (!$user) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, please check password']);
        }     

        if ($user) {

            if($user->status==0)  //if Accounnt is Disabled
            {
                return response()->json(['success' => '0', 'message' => 'Sorry,your account has been suspended! Please contact the site administrator regarding this.'], 200);
            }
            // else if($user->email_verified_at!=null || $user->email_verified_at!='')
            // {
            //     return response()->json(['success' => '0', 'message' => 'Your Email is Not Verified Yet Please Verify it.'], 200);
            // }
            else
            {
                $cred[$login_type] = $request->username;
                $cred['password'] = $request->password;
                // $cred['password'] = md5($request->password);

                try{           
                    if (! $token = JWTAuth::attempt($cred)) {
                        return response()->json(['success' => '0', 'message' => 'Invalid Email or Password'], 200);                    }          
                }
                catch (JWTException $e) {
                // echo $e->getMessage();        
                    return response()->json(['success' => '0', 'message' => 'There is something wrong please try again later.'], 200);
                }

                $btoken =$token;               
                $userdetails=Auth::user();

                return response()->json(['success' => 1,'response'=>'Login Successfully','token'=>$btoken,'data'=>$userdetails], 200);
            }
        }
        else
        {
            return response()->json(['success' => '0','response'=>'Invalid Credentials']);
        }

        //  $validator =Validator::make($request->all(),
        //     [
        //         'email' => 'required',
        //         'password' => 'required',
        //     ]);
        // if($validator->fails())
        // {
        //     return response()->json([ 'result' => 0, 'message' => 'Validation Error', 'errors' => $validator->errors()->messages()]);
        // }
        //  $credentials = $request->only('email', 'password');

        // try{           
        //     if (! $token = JWTAuth::attempt($credentials)) {                    
        //         return response()->json(['success' => 0, 'message' => 'Invalid Email or Password'], 200);
        //     }          
        // }
        // catch (JWTException $e) {
        //         // echo $e->getMessage();        
        //     return response()->json(['success' => '0', 'message' => 'There is something wrong please try again later.'], 200);
        // }

        // $data['token']=$token;        
        // $data['userdata']=Auth::user();

        // return response()->json(['success' => 1,'message'=>'Login Successfully','data'=>$data], 200);

    }

    public function logout(Request $request)
    {
        try {
            // JWTAuth::invalidate($request->token);
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => 1,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => 0,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

   public function registeruser(Request $request)
   {
         // $alldata=$request->getContent();
         // $data= json_decode($alldata, true);        

          $gstno=$request->gstno;
          $phone=$request->phone;
          $email=$request->email;
          $password = Hash::make($request->password);
          $company_name=$request->company_name;
          $address=$request->address;
          $city=$request->city;
          $state=$request->state;
          $zipcode=$request->zipcode;      
          $name=$request->name;      

          $validator = Validator::make($request->all(),
            [
                'gstno' => 'required | max:15|unique:users,gstno',
                'phone' => 'required | numeric',
                'email' => 'required|email|unique:users,email',         
                'password' => 'min:6|required'

            ]);

        if ($validator->fails())
        {
            return response()->json([ 'result' => 0, 'message' => 'Validation Error', 'errors' => $validator->errors()->messages()]);            
        }

        $newuser=new User;
        $otpcode = rand(100000,999999);        

        $newuser->gstno=$gstno;
        $newuser->phone=$phone;
        $newuser->email=$email;
        $newuser->name=$name;
        $newuser->password=$password;      
        $newuser->otp=$otpcode;
        $newuser->company_name=$company_name;
        $newuser->address=$address;
        $newuser->city=$city;
        $newuser->state=$state;
        $newuser->zipcode=$zipcode;      
        $newuser->save();

        if($newuser==true)
        {

            $verificationcode=[
                'COMPANY_NAME'=>'chemexia',               
                'CODE'=>$otpcode,
                'social_icon'=>'',
            ];

            try
            {
                Mail::send('MailTemplate.verification_code',['verificationcode'=>$verificationcode], function($message) use($email) {
                                    // $message->to($SendMailTo,'cfgcf')->subject('Verification Code');
                    $message->to($email,'Subject')->subject('Verification Code');
                    $message->from('chemexia007@gmail.com', 'chemexia');                                    
                });

                if(Mail::failures())
                {
                    return response()->json(['success'=>0 , 'message'=>'fail to send']);
                }
                         
            }
            catch(\Exception $e)
            {
                echo 'errmsg - '.$e->getMessage();
            }
            return response()->json(['success' => 1,'message'=>'User Registered Successfully'],200);
        }
        else
        {
            return response()->json(['success' => 0,'message'=>'Something Went Wrong PLease try later.']);
        }
   }

   public function verifyotp(Request $request)
   {
            $gstno=$request->gstno;
            $otp=$request->otp;

            $status=1;

            if (User::where('gstno', '=', $gstno)->where('otp',$otp)->exists()) {

                $changestatus=User::where('gstno', $gstno)            
                ->update(['status' => $status]);

                if($changestatus==true)
                {
                    return response()->json(['success'=>1,'message'=>'Account Verified Successfully.']);
                }
                else
                {
                 return response()->json(['success'=>0,'message'=>'Something Went Wrong PLease try Again Later.']);   
             }
         }
         else
         {
            return response()->json(['success'=>0,'message'=>'Verification code is Not Matched']);   
        }
   }


   public function sendverificationcode(Request $request)
   {
        $email=$request->email;

        if (User::where('email', '=', $email)->exists())
        {
            $newpassowrd=rand(100000,1000000);
            $mynewpassowrd=md5($newpassowrd);

            $getuserdata=User::select('email','phone','gstno','name')->where('email',$email)->first();

            $useremail=$getuserdata['email'];
            $gstno=$getuserdata['gstno'];
            $name=$getuserdata['name'];            
            

            $url="https://chemexia.starto.in/ResetPassword?ref=okok";

            $forgotdata=[
                'COMPANY_NAME'=>'ChemExia',
                'FIRSTNAME'=>$name,                
                'URL'=>$url,                
                'CODE'=>$newpassowrd,                
            ];

            try
            {

                Mail::send('MailTemplate.forgot_password',['forgotdata'=>$forgotdata], function($message) use($email) {                                    
                    $message->to($email,'Subject')->subject('Verification Code');
                    $message->from('chemexia007@gmail.com', 'chemexia');                                    
                });

                if(Mail::failures())
                {
                    return response()->json(['success'=>0 , 'message'=>'fail to send']);
                }
                else
                {
                    return response()->json(['success'=>1,'message'=>'Verification code has been sent on your Email']);
                }
            }
            catch(\Exception $e)
            {
                echo 'errmsg - '.$e->getMessage();
            }
         }
         else
         {
            return response()->json(['success'=>0,'message'=>'Your Email id is not exists']);
         }
     }
}
