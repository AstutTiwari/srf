<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        \DB::table('users')->insert([
            [
                'id' => 1,
                'firstname' => 'Shri',
                'lastname' => 'Ram',
                'phone' => '(232) 323-2323',
                'email' => 'shriram@yopmail.com',
                'password' => '$2y$10$ISYmbg9JyhkqZeoZx0KFXO1wg9EBfI0yniaHNt6KeSwKwh9YS8Pq2', //admin@123
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);

        //add admin roles in model_has_roles table  
        \DB::table('model_has_roles')->delete();
        \DB::table('model_has_roles')->insert([
            'role_id'=>1,
            'model_type'=>'App\Models\User',
            'model_id'=>1
        ]);
    }
}
