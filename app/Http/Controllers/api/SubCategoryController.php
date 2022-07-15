<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SubCategory;

class SubCategoryController extends Controller
{
    public function viewsubcategory(Request $request)
    {
        $category_id=$request->category_id;

        if($category_id!=null || $category_id!='')
        {
            $subcategory=SubCategory::where('category_id',$category_id)->with('categorydata')->get();            
        }
        else
        {
            $subcategory=SubCategory::with('categorydata')->get();
        }

        return response()->json(['status'=>1,'message'=>'Home Page SubCategoryData','data'=>$subcategory]);
    }
}
