<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table='tbl_subcategory';

    protected $hidden = [
        'image','created_at','updated_at'
    ];


    protected $appends = ['image_subcategory'];

    public function getImageSubcategoryAttribute()
    {   
        if($this->image!=''||$this->image!=null)
        {
            return url('/').'/upload/subcategory/'.$this->image;
        }
        else
        {
            return url('/').'/upload/subcategory/'.'default_category.png';
        }        
    }

    public function categorydata()
    {
        return $this->hasOne('App\Category','id','category_id');
                                       //primarykey,foreignkey
    }
}
