<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('colors')->delete();
        \DB::table('colors')->insert([
          0=>[
            'id' => 1,
            'name' => 'Rose Gold',
            'status' => '1',
          ],
          1=>[
            'id' => 2,
            'name' => 'White Gold',
            'status' => '1',
          ],
          2=>[
            'id' => 3,
            'name' => 'Yellow Gold',
            'status' => '1',
          ]
        ]);
    }
}
