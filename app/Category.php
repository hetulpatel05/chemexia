<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $hidden = [
        'image','created_at','updated_at'
    ];

    protected $fillable=['name'];
    
    protected $appends = ['image_category'];

    public function getImageCategoryAttribute()
    {   
        if($this->image!=''||$this->image!=null)
        {
            return url('/').'/upload/'.$this->image;
        }
        else
        {
            return url('/').'/upload/'.'default_category.png';
        }        
    }
}
