<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\MyCategories;

class CategoryController extends Controller
{
    public function viewcategory()
    {
        $category=Category::all();

        return response()->json(['status'=>1,'message'=>'Home Page Category Data','data'=>$category]);
    }

    public function viewallcategory(Request $request)
    {
        try
        {
            $allcategory=MyCategories::pluck('products');            

            foreach ($allcategory as $key => $value) {

                $test[]=explode(',',$value);
            }

            $out = implode(",",array_map(function($a) {return implode(",",$a);},$test));
            $tempArray = implode(",",array_unique(explode(',',$out)));

            $finalproduct=explode(',',$tempArray);

            foreach ($finalproduct as $key => $value) {

                // $myproduct[]=ltrim($value);
                $myproduct[]=trim($value);
            }

            return response()->json(['status'=>1,'msg'=>'All Category Data','data'=>$myproduct]);       

        }
        catch(\Exception $e)
        {
            return response()->json(['status'=>0,'msg'=>$e->getMessage()]);
        }        
    }

    public function searchallcategory(Request $request)
    {
        try
        {
            $category=$request->category;

            if($category!=''|| $category!=null)
            {
                $total=MyCategories::where('products','like','%'.$category.'%')->count();

                $allcategory=MyCategories::where('products','like','%'.$category.'%')->get();
            }
            else
            {
            // $allcategory=MyCategories::all();      
                $allcategory=MyCategories::limit(10)->get();         
                $total=MyCategories::count();         
            }

            foreach ($allcategory as $key => $value) {

                $test[]=explode(',',$value['products']);               

            }

            $out = implode(",",array_map(function($a) {return implode(",",$a);},$test));

            $tempArray = implode(",",array_unique(explode(',',$out)));

            $finalproduct=explode(',',$tempArray);

            foreach ($finalproduct as $key => $value) {

                $myproduct[]=trim($value);
            }

            if($allcategory->toArray())
            {
                foreach ($allcategory as $eventsval) 
                {  
                    $eventsval->products = $myproduct;
                }
            }

            return response()->json(['status'=>1,'msg'=>'All searchCategory Data','total'=>$total,'data'=>$allcategory]);

        }
        catch(\Exception $e)
        {
            return response()->json(['status'=>0,'msg'=>'Something went Wrong please try again later.']);
            // return response()->json(['status'=>0,'msg'=>$e->getMessage()]);
        }
    }
}
