<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivacyPolicy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(PRIVACY)->insert([[
            'heading' => 'heading',
            'content' => 'content',
            'type' => 'terms',
            'created_at' => date('Y-m-d h:i:s'),
        ], [
            'heading' => 'heading',
            'content' => 'content',
            'type' => 'privacy',
            'created_at' => date('Y-m-d h:i:s'),
        ]]);
    }
}
