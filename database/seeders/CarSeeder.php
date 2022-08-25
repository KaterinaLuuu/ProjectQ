<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $body = CarBody::inRandomOrder()->take(4)->get();
        $class = CarClass::inRandomOrder()->take(4)->get();
        $engine = CarEngine::inRandomOrder()->take(4)->get();

        $categories = Category::whereNotIn('slug', ['cars', 'suvs'])->inRandomOrder()->get();


        Car::factory()->count(20)->sequence(fn ($sequence) => [
            'car_body_id' => rand(0 ,1) === 1 ? $body->random() : null,
            'car_class_id' => $class->random(),
            'car_engine_id' => $engine->random(),
            'category_id' => $categories->random()
        ])->create();
    }
}
