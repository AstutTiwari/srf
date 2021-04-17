<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MetalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('metals')->delete();
        \DB::table('metals')->insert([
          0=>[
            'id' => 1,
            'name' => 'diamond',
            'status' => '1',
          ],
          1=>[
            'id' => 2,
            'name' => 'gold',
            'status' => '1',
          ],
          2=>[
            'id' => 3,
            'name' => 'gemstone',
            'status' => '1',
          ],
          3=>[
            'id' => 4,
            'name' => 'silver',
            'status' => '1',
          ],
            
        ]);
    }
}
