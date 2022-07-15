<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Quotation;
use App\User;

class InquiryController extends Controller
{
    public function show()
    {
        $quote=Quotation::join('users','users.id','tbl_quatation.userid')
        ->select('users.name','tbl_quatation.*')
        ->Orderby('tbl_quatation.status','asc')
        ->get();

        return view('quotation.index',compact('quote'));
    }

    public function approvequote($id)
    {
        
        $check=Quotation::where('id',$id)->pluck('status')->first();        

        if($check==0)
        {
            $update=Quotation::where('id', $id)->update(['status' => 1]);            
        }
        else
        {
            $update=Quotation::where('id', $id)->update(['status' => 0]);
        }

        if($update==true)
        {
            return redirect('inquiries');            
        }
    }
}
