<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SocialTableSeeder::class);
        $this->call(BannerTableSeeder::class);
        $this->call(BannerTableSeeder::class);
        $this->call(ProductbannerTableSeeder::class);
        $this->call(ContactusTableDataSeeder::class);
        $this->call(MetalsTableSeeder::class);
        $this->call(ShapeTableSeeder::class);
        $this->call(ColorTableSeeder::class);
    }
}
