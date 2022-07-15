<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellMaterial extends Model
{
    protected $table="tbl_sell_material";

    public function myuser()
    {
        return $this->hasOne('App\User','id','userid');
    }
}
