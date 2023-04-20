<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table(HOME_PAGE)->truncate();
        $data = array(
            array(
                'name' => 'banner',
                'heading' => '',
                'content' => "",
                'image' => "",
                'urls' => "",
                'page_name' => "home",
                'type' => "banner",
                'created_at' => date('Y-m-d h:i:s'),
            ),
            array(
                'name' => 'banner',
                'heading' => '',
                'content' => "",
                'image' => "",
                'urls' => "",
                'page_name' => "home",
                'type' => "banner",
                'created_at' => date('Y-m-d h:i:s'),
            ),
            array(
                'name' => 'welcome',
                'heading' => 'WELCOME TO MANGTUM',
                'content' => "LOREM IPSUM IS SIMPLY DUMMY TEXT OF THE PRINTING",
                'image' => "",
                'urls' => "",
                'page_name' => "home",
                'type' => "welcome",
                'created_at' => date('Y-m-d h:i:s'),
            ),
            array(
                'name' => 'about',
                'heading' => 'heading of about',
                'content' => "this is the content of about",
                'image' => "",
                'urls' => "",
                'page_name' => "home",
                'type' => "about",
                'created_at' => date('Y-m-d h:i:s'),
            ),
            array(
                'name' => 'services',
                'heading' => 'Sell your product with world\'s most unique marketplace',
                'content' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like",
                'image' => "",
                'urls' => "",
                'page_name' => "home",
                'type' => "services",
                'created_at' => date('Y-m-d h:i:s'),
            ),
            array(
                'name' => 'youtube',
                'heading' => '',
                'content' => "",
                'image' => "",
                'urls' => "https://youtube.com",
                'type' => "contact",
                'page_name' => "home",
                'created_at' => date('Y-m-d h:i:s'),
            ),
            array(
                'name' => 'abot-us',
                'heading' => 'section1',
                'content' => "content1",
                'image' => "",
                'urls' => "",
                'type' => "section-1",
                'page_name' => "about",
                'created_at' => date('Y-m-d h:i:s'),
            ),
            array(
                'name' => 'abot-us',
                'heading' => 'section2',
                'content' => "content2",
                'image' => "",
                'urls' => "",
                'type' => "section-2",
                'page_name' => "about",
                'created_at' => date('Y-m-d h:i:s'),
            ),
            array(
                'name' => 'abot-us',
                'heading' => 'section3',
                'content' => "content3",
                'image' => "",
                'urls' => "",
                'type' => "section-3",
                'page_name' => "about",
                'created_at' => date('Y-m-d h:i:s'),
            ),
            array(
                'name' => 'abot-us',
                'heading' => 'section4',
                'content' => "content4",
                'image' => "",
                'urls' => "",
                'type' => "section-4",
                'page_name' => "about",
                'created_at' => date('Y-m-d h:i:s'),
            ),
            array(
                'name' => 'contact-us',
                'heading' => '',
                'content' => "{}",
                'image' => "",
                'urls' => "",
                'type' => "",
                'page_name' => "contact",
                'created_at' => date('Y-m-d h:i:s'),
            ),
        );
        DB::table(HOME_PAGE)->insert($data);

    }
}
