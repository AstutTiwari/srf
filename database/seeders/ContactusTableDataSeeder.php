<?php

namespace Database\Seeders;

use Carbon\Carbon;

use App\Models\AdminContactus;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
class ContactusTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admin_contactus')->delete();
        $data = [
            'id' => 1,
            'contact_number'=> '+91 9910590048',
            'text'=> '<div class="block-footer2"><h2 class="title18 play-font white text-uppercase font-bold">Contact Us</h2><p class="desc white opaci"> Donot hesitate in contacting us for any questions you might have.</p>
            <ul class="list-none contact-foter2">
                <li>
                    <i class="fa fa-location-arrow white"></i>
                    <span class="text-uppercase white opaci">Sadar Bajar, Gurgaon, Haryana 122001</span>
                </li>
            
                <li>
                    <i class="fa fa-volume-control-phone white"></i>
                    <span class="text-uppercase white opaci">+91-9811369903 <br>  0124-233257</span>
                </li>
                <li>
                    <i class="fa fa-location-arrow white"></i>
                    <span class="text-uppercase white opaci">Near Gurudwara Road Showroom, Gurgaon, Haryana 122001</span>
                </li>
            
                <li>
                    <i class="fa fa-volume-control-phone white"></i>
                    <span class="text-uppercase white opaci">+91-9773556210;+91-9910590048 <br>  +91-124-4066570;+91-124-4077570</span>
                </li>
                <li>
                    <i class="fa fa-envelope white"></i>
                    <a class="white opaci" href="mailto:demo@example.com">shriram@shriramjwellwers.in</a>
                </li>
            </ul>
        </div>',
            'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s'),
        ];
        AdminContactus::insert($data);
    }
}