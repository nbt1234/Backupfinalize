<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [['username' => 'admin',
            'first_name' => 'super',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'dec_password' => 'admin1234',
            'role_status' => '1',
            'user_status' => '0',
            'user_block_status' => '0',
            'created_at' => date('Y-m-d h:i:s'),
        ]];
        DB::table(USERS)->insert($users);

        // INSERT ATTRIBUTES SEED
        $attr = [['attr_name' => 'Color',
            'attr_slug' => 'color',
            'category' => 1,
            'role' => 1,
            'adder_id' => 1,
        ],
            ['attr_name' => 'Size',
                'attr_slug' => 'size',
                'category' => 1,
                'role' => 1,
                'adder_id' => 1,
            ], ];
        DB::table(ATTR)->insert($attr);

        // INSERT ATTRIBUTES VALUES  SEED
        $attr_values = [['attr_id' => '1',
            'attr_value' => 'Red',
            'attr_value_slug' => 'red',
            'status' => 0,
            ],
            ['attr_id' => '1',
            'attr_value' => 'Green',
            'attr_value_slug' => 'green',
            'status' => 0,
            ],
            ['attr_id' => '1',
            'attr_value' => 'Blue',
            'attr_value_slug' => 'blue',
            'status' => 0,
            ],
            ['attr_id' => '2',
            'attr_value' => 'Small',
            'attr_value_slug' => 'small',
            'status' => 0,
            ],
            ['attr_id' => '2',
            'attr_value' => 'Medium',
            'attr_value_slug' => 'medium',
            'status' => 0,
            ],
            ['attr_id' => '2',
            'attr_value' => 'Large',
            'attr_value_slug' => 'large',
            'status' => 0,
            ], ];
        DB::table(ATTR_VALUES)->insert($attr_values);

        $brand = [['brand_name' => 'Apple',
            'brand_slug' => 'apple',
        ],
            ['brand_name' => 'Google',
                'brand_slug' => 'google',
            ], ];
        DB::table(BRAND)->insert($brand);

        $tag = [['tag_name' => 'Best',
            'tag_slug' => 'best',
            ],
            ['tag_name' => 'Good',
                'tag_slug' => 'good',
            ],
            ['tag_name' => 'New',
                'tag_slug' => 'new',
            ],
        ];
        DB::table(TAGS)->insert($tag);

        // CATEGORIES SEEDERS
        $cat = [['cate_name' => 'Electronics',
            'slug' => 'electronics',
            'table_slug' => 'electronics',
            'description' => 'electronics electronics electronics electronics',
            'status' => 0,
            ],
        ];
        DB::table(CATE)->insert($cat);
        // CATEGORIES SEEDERS
        $cat = [['subcate_name' => 'Mobile',
            'cat_id' => '1',
            'sub_cate_slug' => 'mobile',
            'description' => 'electronics electronics electronics electronics',
            'status' => 0,
            ],
        ];
        DB::table(SUBCATE)->insert($cat);
    }
}
