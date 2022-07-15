<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }
    

    public function showusers($value='')
    {
        $users=User::where('role','=',null)->get();
        // $users=User::all();
        return view('users.index',compact('users'));
    }

    public function edituser($id)
    {
        // dd('ok');
        // $user=User::where('userid',$id)->first();
        $user=User::find($id);
        return view('users.edit',compact('user'));        
    }

    public function updateuser(Request $request,$id)
    {
        // dd($id);
        $gstno=$request->txtgstno;
        $name=$request->txtname;
        $companyname=$request->txtcmpname;
        $email=$request->txtemail;
        $phone=$request->txtphone;
        $address=$request->txtaddress;
        $city=$request->txtcity;
        $state=$request->txtstate;        
        $zipcode=$request->txtzipcode;


        // $savedata=User::where('userid', $id)->update(['fname' => $fname,'lname'=>$lname,'email'=>$email,'phone'=>$phone,'age'=>$age,'weight'=>$weight]);
        
        $savedata = User::find($id);
        $savedata->gstno=$gstno;
        $savedata->name=$name;
        $savedata->company_name=$companyname;
        $savedata->email=$email;
        $savedata->phone=$phone;
        $savedata->address=$address;
        $savedata->city=$city;
        $savedata->state=$state;
        $savedata->zipcode=$zipcode;
        $savedata->save();

        // dd($savedata);
        if($savedata==true)
        {
            // return redirect('showuser')->with('status', 'Data Saved sucessfully');
            return redirect('users')->with('status', 'Data Updated sucessfully');
        }
        else
        {
            return redirect()->back()->with('status', 'Something Went Wrong');
        }
    }

    public function deleteuser($id)
    {
        try
        {
            $user = User::find($id);     
            $user->delete();
            if($user==true)
            {
               return redirect()->back()->with('danger', 'Data Deleted sucessfully');
           }
           else
           {
            return redirect()->back()->with('danger', 'Something went wrong please try again later.');
            }
       }
        catch(\Exception $e)
        {
            return redirect()->back()->with('danger', $e->getMessage());
        }
       
   }
}
