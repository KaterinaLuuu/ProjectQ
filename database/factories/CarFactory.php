<?php

namespace Database\Factories;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word(),
            "body" => $this->faker->word(),
            "price" => rand(900_000, 9_999_999),
            "old_price" => rand(900_000, 9_999_999),
            "salon" => $this->faker->word(),
            "car_body_id" => CarBody::factory(),
            "kpp" => $this->faker->word(),
            "year" => rand(2010, 2022),
            "color" => $this->faker->colorName(),
            "car_class_id" => CarClass::factory(),
            "car_engine_id" => CarEngine::factory(),
            "is_new" => (bool)rand(0, 1),
            "image_id" => Image::factory(),
        ];
    }
}
