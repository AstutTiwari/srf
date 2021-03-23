<?php

namespace Database\Seeders;



use Carbon\Carbon;

use App\Models\ProductBanner;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
class ProductbannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('product_banners')->delete();
        $files = \File::allFiles(public_path('product_banners'));
        $i = 1;
        $banner_data = [];
        
        foreach($files as $key => $file)
        {
            $name = time() . '_' . str_replace(' ', '_', $file->getFilename());
            $filePath = 'product_banners/' . $name;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $banner_data[] = [
                'name' => $file->getFilename(),
                'url' => $filePath,
                'slug'=> pathinfo($file->getFilename(),PATHINFO_FILENAME),
                'order' => $i,
                'title' => serviceType(pathinfo($file->getFilename(),PATHINFO_FILENAME)),
                'sub_title' => pathinfo($file->getFilename(),PATHINFO_FILENAME),
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
            $i++;
        }
        ProductBanner::insert($banner_data);
    }
}