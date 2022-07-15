<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MyCategories extends Model
{
    protected $table="tbl_categories";

    protected $fillable=['company_name','person_name','mobile','email','website','city','state','products','fax'];
}

class CategoryDataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        // dd($myid);
        $person=explode(",",$row['person']);
        $mobile=explode(",",$row['mobile']);

        return new MyCategories([

            'company_name'     => $row['company_name'],
            'person_name'    => $person[0],
            'mobile' => $mobile[0],
            'email'    => $row['email'],
            'website'    => $row['web'],
            'city'    => $row['city'],
            'state'    => $row['state'],
            'products'    => $row['product'],
            'fax'    => $row['fax']
        ]);
    }
}
