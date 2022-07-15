<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ManagePdf;

class PdfController extends Controller
{
    public function showpdf()
    {
        $allpdf=ManagePdf::all();

        return view('pdf.index',compact('allpdf'));
    }

    //for the API
    public function displaypdf()
    {
        $allpdf=ManagePdf::all();

        return response()->json(['status'=>1,'message'=>'Pdf List','data'=>$allpdf]);
    }

    public function viewform()
    {
        return view('pdf.add');
    }

    public function save(Request $request)
    {
        $request->validate([
            'file_pdf' => 'required',                     
        ],[
            'file_pdf.required' => 'File must not be empty!',
        ]
     );

        $pdf_file=$request->file_pdf;
        


        if($request->file_pdf!=null || $request->file_pdf !='')
        {
            $pdfname = strtolower(time().'.'.$pdf_file->getClientOriginalExtension());            
            $path ='upload/pdf/';
            $pdf_file->move($path, $pdfname);
        }
        
        $savedata= new ManagePdf;

        $savedata->pdf_file=$pdf_file;        
        $savedata->save();

        if($savedata==true)
        {
            return redirect('viewpdflist')->with('success', 'Pdf added Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went Wrong please try again later.');
        }
    }

    public function deletepdf(Request $request,$id)
    {
        try
        {
            // dd($id);
            $pdf = ManagePdf::find($id);
            // $path=$pdf->pdf_path;
            // unlink($path);
            $pdf->delete();

            if($pdf==true)
            {                
               return redirect()->back()->with('danger', 'Pdf Deleted sucessfully');
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
