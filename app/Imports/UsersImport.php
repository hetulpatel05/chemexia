<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $products=explode(",",$row['product']);

        // print_r($products);
        // die;

        foreach ($products as $key => $product) {
            
             return new User([
            
            'name'     => $product,
            // 'email'    => $row[1], 
            'password' => \Hash::make('123456'),
        ]);
        }
       
    }
}
