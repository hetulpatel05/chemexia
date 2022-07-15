<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SubCategory;
use App\Category;
use App\QuantityType;

class SubCategoryController extends Controller
{
    public function show()
    {
        $subcategory=SubCategory::join('categories','categories.id','tbl_subcategory.category_id')
        ->leftjoin('tbl_quantity_type','tbl_quantity_type.id','tbl_subcategory.qty_type_id')
        ->select('categories.name as categoryname','tbl_subcategory.*','tbl_quantity_type.name as qty_type_name')
        ->get();

        return view('subcategory.index',compact('subcategory'));
    }

    public function viewform($value='')
    {
        $category=Category::all();
        $qtytype=QuantityType::all();

        return view('subcategory.add',compact('category','qtytype'));
    }

    public function save(Request $request)
    {

           $request->validate([
            'txtsubcategoryname' => 'required',                   
            'txtcategoryid' => 'required',
            'qty_type' => 'required',
        ],
            [
            'txtsubcategoryname.required' => 'SubCategory Name must not be empty!',
            'txtcategoryid.required' => 'Category is required',
            'qty_type.required' => 'Quantity Type Required',
            ]
           );

        $categoryid=$request->txtcategoryid;
        $subcategoryname=$request->txtsubcategoryname;
        $subcategoryimage=$request->subcategoryimage;
        $inquirydetails=$request->txtinqdetails;
        $quanity=$request->txtquantity;
        $delivery_place=$request->txtdeliveryplace;
        $purpose=$request->txtpurpose;
        $supplierlocation=$request->txtsupplierlocation;
        $buytype=$request->txtbuytype;
        $typeofrequirement=$request->txtreqtype;
        $frequencyofrequirement=$request->txtreqfrequency;
        $qty_type=$request->qty_type;


        if($subcategoryimage!=null || $subcategoryimage !='')
        {
            $imagename = strtolower(time().'.'.$subcategoryimage->getClientOriginalExtension());            
            $imagepath ='upload/subcategory/';
            $subcategoryimage->move($imagepath, $imagename);
        }
        else
        {
            $imagename='';
        }

        $savedata= new SubCategory;

        $savedata->category_id=$categoryid;
        $savedata->name=$subcategoryname;
        $savedata->image=$imagename;
        $savedata->inqury_details=$inquirydetails;
        $savedata->purpose=$purpose;
        $savedata->delivery_place=$delivery_place;
        $savedata->quantity=$quanity;
        $savedata->qty_type_id=$qty_type;
        $savedata->supplier_location=$supplierlocation;
        $savedata->need_of_buy=$buytype;
        $savedata->requirement_type=$typeofrequirement;
        $savedata->requirement_frequency=$frequencyofrequirement;
        $savedata->save();

        if($savedata==true)
        {
            return redirect('managesubcategory')->with('success', 'SubCategory added Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went Wrong please try again later.');
        }
   
    }


    public function updatesubcategory(Request $request,$id)
    {

        
           $request->validate([
            'txtsubcategoryname' => 'required',                    
            'txtcategoryid' => 'required',                    
            'qty_type' => 'required',                    
            ],[
                'txtsubcategoryname.required' => 'SubCategory Name must not be empty!',
                'txtcategoryid.required' => 'Category is Required',
                'qty_type.required' => 'Quantity Type Required',
            ]
         );

        $categoryid=$request->txtcategoryid;
        $subcategoryname=$request->txtsubcategoryname;
        $subcategoryimage=$request->subcategoryimage;
        $inquirydetails=$request->txtinqdetails;
        $quanity=$request->txtquantity;
        $qty_type=$request->qty_type;
        $delivery_place=$request->txtdeliveryplace;
        $purpose=$request->txtpurpose;
        $supplierlocation=$request->txtsupplierlocation;
        $buytype=$request->txtbuytype;
        $typeofrequirement=$request->txtreqtype;
        $frequencyofrequirement=$request->txtreqfrequency;

        if($subcategoryimage!=null || $subcategoryimage !='')
        {
            $imagename = strtolower(time().'.'.$subcategoryimage->getClientOriginalExtension());            
            $imagepath ='upload/subcategory/';
            $subcategoryimage->move($imagepath, $imagename);
        }
        else
        {
            $getdata = SubCategory::find($id);
            $imagename=$getdata->image;
            
        }

        
        $savedata = SubCategory::find($id);
        $savedata->category_id=$categoryid;
        $savedata->name=$subcategoryname;
        $savedata->image=$imagename;
        $savedata->inqury_details=$inquirydetails;
        $savedata->purpose=$purpose;
        $savedata->delivery_place=$delivery_place;
        $savedata->quantity=$quanity;
        $savedata->qty_type_id=$qty_type;
        $savedata->supplier_location=$supplierlocation;
        $savedata->need_of_buy=$buytype;
        $savedata->requirement_type=$typeofrequirement;
        $savedata->requirement_frequency=$frequencyofrequirement;
        $savedata->save();

        if($savedata==true)
        {
            return redirect('managesubcategory')->with('success', 'SubCategory added Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went Wrong please try again later.');
        }
   
    
    }

    public function editsubcategory($id)
    {        
        $subcategory=SubCategory::find($id);
        $category=Category::all();
        $qtytype=QuantityType::all();

        return view('subcategory.edit',compact('subcategory','category','qtytype'));
    }

    public function deletesubcategory($id)
    {
        try
        {
            $subcategory = SubCategory::find($id);
            $imgpath=$subcategory->image_subcategory;
            unlink($imgpath);
            $subcategory->delete();

            if($subcategory==true)
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
