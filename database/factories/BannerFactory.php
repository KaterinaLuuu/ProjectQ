<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new FakerPicsumImagesProvider($this->faker));
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'link' => $this->faker->url(),
            'image_id' => Image::factory(),
        ];
    }
}
