<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShapeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('shapes')->delete();
        \DB::table('shapes')->insert([
          0=>[
            'id' => 1,
            'name' => 'Heart',
            'status' => '1',
          ],
          1=>[
            'id' => 2,
            'name' => 'Oval',
            'status' => '1',
          ],
          2=>[
            'id' => 3,
            'name' => 'Round',
            'status' => '1',
          ],
          3=>[
            'id' => 4,
            'name' => 'Square',
            'status' => '1',
          ],
          4=>[
            'id' => 5,
            'name' => 'Trianle',
            'status' => '1',
          ],
          5=>[
            'id' => 6,
            'name' => 'Leaves & Flowers',
            'status' => '1',
          ], 
        ]);
    }
}
