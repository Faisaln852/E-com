<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Admin',
            'email'=>'Admin@gmail.com',
            'password'=>bcrypt('password'),
            'lname'=>'Admin',
            'phone'=>'0349000',
            'address1'=>'dummy address',
            'address2'=>'dummy address',
            'city'=>'Lahore',
            'state'=>'panjab',
            'country'=>'Pakistan',
            'pincode'=>'54000',
            'role_as'=>'1',
        ]);
    }
}
