<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carsCategory = [
            'name' => 'Легковые',
            'slug' => 'cars',
            'sort' => '1',
            'children' => [
                ['name' => 'Седаны', 'slug' => 'sedan', 'sort' => '2'],
                ['name' => 'Хетчбеки', 'slug' => 'hatchbacks', 'sort' => '3'],
                ['name' => 'Универсалы', 'slug' => 'station-wagons', 'sort' => '4'],
                ['name' => 'Купе', 'slug' => 'coupe', 'sort' => '5'],
                ['name' => 'Родстеры', 'slug' => 'roadsters', 'sort' => '6'],
            ]
        ];
        $suvsCategory = [
            'name' => 'Внедорожники',
            'slug' => 'suvs',
            'sort' => '7',
            'children' => [
                ['name' => 'Рамные', 'slug' => 'frame', 'sort' => '8'],
                ['name' => 'Пикап', 'slug' => 'pickup', 'sort' => '9'],
                ['name' => 'Кроссоверы', 'slug' => 'crossovers', 'sort' => '10'],
            ]
        ];
        $rareCategory = ['name' => 'Раритетные', 'slug' => 'rare', 'sort' => '11'];
        $saleCategory = ['name' => 'Распродажа', 'slug' => 'sale', 'sort' => '12'];
        $newCategory = ['name' => 'Новинки', 'slug' => 'new', 'sort' => '13'];

        Category::create($carsCategory);
        Category::create($suvsCategory);
        Category::create($rareCategory);
        Category::create($saleCategory);
        Category::create($newCategory);
    }
}
