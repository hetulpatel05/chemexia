<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\SellMaterial;

class SellController extends Controller
{
    public function savesellmaterial(Request $request)
    {
        try
        {
            $userid  =Auth::user()->id;

            $validator = Validator::make($request->all(),
                [
                    'material_name' => 'required',
                    'price' => 'numeric|required',
                    'quantity' => 'numeric|required',
                    'description' => 'required',
                    'brand' => 'required',
                    'packing_type' => 'required',
                    'qty_type' => 'required'

                ]);

            if ($validator->fails())
            {
                return response()->json([ 'result' => 0, 'message' => 'Validation Error', 'errors' => $validator->errors()->messages()]);            
            }

            $material_name=$request->material_name;
            // $company_name=$request->company_name;
            // $location=$request->location;
            $price=$request->price;
            $quantity=$request->quantity;
            $description=$request->description;
            $brand=$request->brand;
            $packing_type=$request->packing_type;        
            $qty_type=$request->qty_type;        

            $savedata=new SellMaterial;      

            $savedata->userid=$userid;
            $savedata->material_name=$material_name;
            // $savedata->company_name=$company_name;
            // $savedata->location=$location;
            $savedata->price=$price;      
            $savedata->quantity=$quantity;      
            $savedata->description=$description;      
            $savedata->brand=$brand;      
            $savedata->packing_type=$packing_type;      
            $savedata->qty_type=$qty_type;      
            $savedata->save();

            if($savedata==true)
            {
                return response()->json(['status'=>1,'message'=>'Record placed successfully.']); 
            }
            else
            {
                return response()->json(['status'=>0,'message'=>'Something Went Wrong PLease try later.']);
            }
        }
        catch(\Exception $e)
        {
            return response()->json(['status'=>0,'message'=>$e->getMessage()]);
        }
    }

    public function viewsellmaterial(Request $request)
    {
        try
        {
            $userid  =Auth::user()->id;

            // $viewsellmaterial=SellMaterial::where('userid','!=',$userid)->OrderBy('id','desc')->with('myuser')->get();

            $viewsellmaterial=SellMaterial::OrderBy('id','desc')->with('myuser')->get();

            return response()->json(['status'=>1,'message'=>'Sell Material Data','data'=>$viewsellmaterial]);
        }
        catch(\Exception $e)
        {
            return response()->json(['status'=>0,'message'=>$e->getMessage()]);
        }
    }
}
