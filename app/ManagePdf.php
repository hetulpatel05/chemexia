<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagePdf extends Model
{
    protected $table="tbl_pdf";

    protected $hidden = [
        'pdf_file','created_at','updated_at'
    ];

    protected $appends = ['pdf_path'];

    public function getPdfPathAttribute()
    {   
        if($this->pdf_file!=''||$this->pdf_file!=null)
        {
            return url('/').'/upload/pdf/'.$this->pdf_file;
        }
        else
        {
            return url('/').'/upload/'.'default_category.png';
        }        
    }
}
