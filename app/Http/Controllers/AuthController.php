<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;



class AuthController extends Controller
{
   public function __construct()
   {
        // $this->middleware('auth:api', ['except' => ['login']]);
   }

   public function checklogin(Request $request)
   {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);       

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' =>'admin'])) { 
               // dd('ok');           
            // return view('welcome');
            return redirect('dashboard');
        }      
        else
        {            
            return back()->with('error','Email or Password is Incorrect please try again.');
        }
    
   }

   public function logout()
   {
        Auth::logout();
        Session::flush();
        return redirect('/');
   }
}
