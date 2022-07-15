<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table="tbl_quatation";

     protected $fillable = [
        'product_name','userid','product_desc', 'quantity','amount','qty_type',
    ];

    public function myuser()
    {
        return $this->hasOne('App\User','id','userid');
                                       //primarykey,foreignkey
    }
}
