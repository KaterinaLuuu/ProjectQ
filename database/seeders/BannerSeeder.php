<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            'public/banners/test_banner_1.jpg',
            'public/banners/test_banner_2.jpg',
            'public/banners/test_banner_3.jpg',
        ];

        foreach ($banners as $banner)
        {
            $image = Image::factory()->create(['path' => $banner]);
            Banner::factory()->create(['image_id' => $image->id]);
        }
    }
}
