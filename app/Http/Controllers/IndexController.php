<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\User;
use App\UsersdataImport;
use App\MyCategories;
use App\CategoryDataImport;
use App\Category;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
// use Excel;

class IndexController extends Controller
{
    public function dashboard(Request $request)
    {
        $totaluser=User::where('role','=',null)->count();
        $totalquote=Quotation::count();
        return view('dashboard',compact('totaluser','totalquote'));
    }

    public function upload_data(Request $request)
    {
        try
        {
            $userdata=Excel::import(new UsersdataImport,request()->file('myfile'));
            dd($userdata);
        }
        catch(\Exception $e)
        {
            return response()->json($e->getMessage());
        }


        // Excel::import(new UsersImport,request()->file('myfile'));
    }

}
