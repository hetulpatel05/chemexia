<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellMaterial;

class SalesController extends Controller
{
    public function show()
    {
        $sellmaterial=SellMaterial::join('users','users.id','tbl_sell_material.userid')
        ->select('users.name','tbl_sell_material.*')
        ->get();

        return view('sales.index',compact('sellmaterial'));
    }
}
