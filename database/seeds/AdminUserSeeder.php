<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Hetul',
            'gstno' => '24AADCB2230M1Z2',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123456'),
        ]);
    }
}
