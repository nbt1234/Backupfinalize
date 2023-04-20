<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(SETTING)->insert([
            'details' => '{"paypal_client_id":"Test","paypal_secret_id":"Test"}',
            'status' => '1',
            'type' => 'paypal',
            'created_at' => date('Y-m-d h:i:s'),
        ]);
    }

}
