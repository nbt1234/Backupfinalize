<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('username' => 'cyrax',
                'first_name' => 'sir',
                'last_name' => 'cyrax',
                'email' => 'cyrax@gmail.com',
                'password' => Hash::make('admin1234'),
                'dec_password' => 'admin1234',
                'role_status' => '4',
                'user_status' => '0',
                'user_block_status' => '0',
                'created_at' => date('Y-m-d h:i:s'),
            ));

        DB::table(USERS)->insert($data);

        DB::table(VENDORS)->insert(['username' => 'jack',
            'ven_slug' => 'jack',
            'email' => 'jack@gmail.com',
            'password' => Hash::make('admin1234'),
            'dec_password' => 'admin1234',
            'login_type' => 'email',
            'role_status' => '3',
            'vendor_status' => '0',
            'vendor_block_status' => '0',
            'created_at' => date('Y-m-d h:i:s')]);
    }
}
