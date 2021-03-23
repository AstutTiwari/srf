<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('social_icons')->delete();
        \DB::table('social_icons')->insert([
          0=>[
            'id' => 1,
            'name' => 'Facebook',
            'icon_name' => 'fab fa-facebook-f' ,
            'redirect_url' => '',
            'order' => '1',
            'status' => '1',
          ],
          1=>[
            'id' => 2,
            'name' => 'Linkdin',
            'icon_name' => 'fab fa-linkedin-in' ,
            'redirect_url' => '',
            'order' => '2',
            'status' => '1',
          ],
          2=>[
            'id' => 3,
            'name' => 'Twitter',
            'icon_name' => 'fab fa-twitter' ,
            'redirect_url' => '',
            'order' => '3',
            'status' => '1',
          ],
          3=>[
            'id' => 4,
            'name' => 'Behance',
            'icon_name' => 'fab fa-behance' ,
            'redirect_url' => '',
            'order' => '4',
            'status' => '1',
          ],
            
        ]);
      }
}
