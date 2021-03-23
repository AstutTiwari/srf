<?php

namespace Database\Seeders;

use Carbon\Carbon;

use App\Models\Banner;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('banners')->delete();
        $files = \File::allFiles(public_path('banner'));
        $i = 1;
        $banner_data = [];
        $title = 'Jewelry collection';
        $sub_title = "This unique jewelry is handcrafted on the beautiful island of Nantucket using fine silver and semi precious stones.";
        foreach($files as $key => $file)
        {
            $name = time() . '_' . str_replace(' ', '_', $file->getFilename());
            $filePath = 'banner/' . $name;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $banner_data[] = [
                'name' => $file->getFilename(),
                'url' => $filePath,
                'order' => $i,
                'title' => $title,
                'sub_title' => $sub_title,
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
            $i++;
        }
        Banner::insert($banner_data);
    }
}