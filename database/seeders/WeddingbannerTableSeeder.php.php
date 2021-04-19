<?php

namespace Database\Seeders;

use App\Models\Wedding;
use Illuminate\Database\Seeder;

class WeddingbannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('weddings')->delete();
        $files = File::allFiles(public_path('wedding_banner'));
        foreach($files as $file)
        {
            $name     = time() . '_' . str_replace(' ', '_', $file->getFilename());
            $filePath = 'wedding_banner/' . $name;
            Storage::disk('public')->put($filePath, File::get($file));
            $data = [
                'id' => 1,
                'text' => '<h2 class="title30 dark text-uppercase font-bold play-font">Wedding Jwellery</h2><h2 class="title30 dark text-uppercase font-normal play-font">upto 60% off</h2>',
                'banner_path' => $filePath,
                'banner_name' => $file->getFilename(),
            ];
        }
        Wedding::insert($data);
    }
}
