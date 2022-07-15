<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;

use Validator;

class CategoryController extends Controller
{
    public function showcategory($value='')
    {
        $category=Category::OrderBy('id','desc')->get();

        return view('category.index',compact('category'));
    }

   

    public function viewform($value='')
    {
        return view('category.add');
    }

    public function save(Request $request)
    {
           $request->validate([
            'txtcategoryname' => 'required',                     
        ],[
            'txtcategoryname.required' => 'Category Name must not be empty!',
        ]
     );

        $categoryname=$request->txtcategoryname;
        $categoryimage=$request->categoryimage;


        if($request->categoryimage!=null || $request->categoryimage !='')
        {
            $imagename = strtolower(time().'.'.$categoryimage->getClientOriginalExtension());            
            $imagepath ='upload/';
            $categoryimage->move($imagepath, $imagename);
        }
        else
        {
            $imagename='';
        }

        $savedata= new Category;

        $savedata->name=$categoryname;
        $savedata->image=$imagename;
        $savedata->save();

        if($savedata==true)
        {
            return redirect('managecategory')->with('success', 'Category added Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went Wrong please try again later.');
        }

   }

   public function editcategory($id)
    {        
        $category=Category::find($id);
        return view('category.edit',compact('category'));        
    }

    public function updatecategory(Request $request,$id)
    {
        try     
        {
            $categoryname=$request->txtcategoryname;
            $categoryimage=$request->categoryimage;


            if($request->categoryimage!=null || $request->categoryimage !='')
            {
                // dd($categoryimage);

                $imagename = strtolower(time().'.'.$categoryimage->getClientOriginalExtension());

                $imagepath ='upload/';
                $categoryimage->move($imagepath, $imagename);
            }
            else
            {
                
                $getdata = Category::find($id);
                $imagename=$getdata->image;
            }

            $savedata = Category::find($id);
            $savedata->name=$categoryname;
            $savedata->image=$imagename;       
            $savedata->save();

        
            if($savedata==true)
            {            
                return redirect('managecategory')->with('success', 'Category Updated Successfully');
            }
            else
            {
                return redirect()->back()->with('error', 'Something went Wrong please try again later.');
            }
        }
        catch(\Exception $e)
        {
            return redirect()->json(['error', $e->getMessage()]);
        }

            
    
    }


    public function deletecategory($id)
    {
        try
        {
            $category = Category::find($id);
            $imgpath=$category->image_category;
            unlink($imgpath);
            $category->delete();

            if($category==true)
            {                
               return redirect()->back()->with('danger', 'Category Deleted sucessfully');
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
