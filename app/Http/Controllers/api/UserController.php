<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;

use App\User;

class UserController extends Controller
{

    public function viewuserprofile()
    {
        $userdetails  =Auth::user();

        return response()->json($userdetails);
    }

    public function updateprofile(Request $request)
    {
        try
        {
            $userid  =Auth::user()->id;


            $validator = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'company_name' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'zipcode' => 'required',
                    // 'gstno' => 'required|max:15|unique:users,gstno',
                    'gstno' => 'required|unique:users,gstno,'.$userid,
                    'phone' => 'required |numeric',
                    // 'email' => 'required|email|unique:users,email',
                    'email' => 'required|unique:users,email,'.$userid

                ]);

            if ($validator->fails())
            {
                return response()->json([ 'result' => 0, 'message' => 'Validation Error', 'errors' => $validator->errors()->messages()]);            
            }

            $name=$request->name;
            $gstno=$request->gstno;
            $company_name=$request->company_name;
            $phone=$request->phone;
            $email=$request->email;
            $address=$request->address;
            $city=$request->city;
            $state=$request->state;
            $zipcode=$request->zipcode;


            $savedata=User::find($userid);

            $savedata->name=$name;
            $savedata->gstno=$gstno;
            $savedata->company_name=$company_name;
            $savedata->address=$address;
            $savedata->email=$email;      
            $savedata->phone=$phone;  
            $savedata->address=$address;
            $savedata->city=$city;    
            $savedata->state=$state;  
            $savedata->zipcode=$zipcode;

            $savedata->save();

            if($savedata==true)
            {
                return response()->json(['status'=>1,'message'=>'Record Updated Successfully.']);
            }
            else
            {   
                return response()->json(['status'=>0,'message'=>'Something Went Wrong Please try again later.']);
            }



        }
        catch(\Exception $e)
        {
            return response()->json(['status'=>0,'message'=>$e->getMessage()]);
        }
    }
}
