<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Quotation;

class QuotationController extends Controller
{
    public function addquotation(Request $request)
    {
        try
        {
            $userid  =Auth::user()->id;

            $validator = Validator::make($request->all(),
                [
                    'product_name' => 'required',
                    'product_desc' => 'required',
                    'quantity' => 'numeric|required',                    
                    'amount' => 'required|numeric',
                    'qty_type' => 'required'

                ]);

            if ($validator->fails())
            {
                return response()->json([ 'result' => 0, 'message' => 'Validation Error', 'errors' => $validator->errors()->messages()]);            
            }            
            $savedata['userid']=$userid;
            $savedata['product_name']=$request->product_name;
            $savedata['product_desc']=$request->product_desc;
            $savedata['quantity']=$request->quantity;
            $savedata['amount']=$request->amount;
            $savedata['qty_type']=$request->qty_type;

            $save=Quotation::create($savedata);
            

            if($save==true)
            {
                return response()->json(['status'=>1,'message'=>'Record Saved successfully.']);
            }
            else
            {
                return response()->json(['status'=>1,'message'=>'Something Went Wrong please try again later.']);
            }


        }
        catch(\Exception $e)
        {
            return response()->json(['status'=>0,'message'=>$e->getMessage()]);
        }
    }

    public function viewquotation()
    {
        try
        {
            $userid  =Auth::user()->id;

            $viewquote=Quotation::where('status',1)->OrderBy('id','desc')->with('myuser')->get();

            return response()->json(['status'=>1,'message'=>'Quotation Data','data'=>$viewquote]);
        }
        catch(\Exception $e)
        {
            return response()->json(['status'=>0,'message'=>$e->getMessage()]);
        }        
    }
}
