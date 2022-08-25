<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        dd(Str::remove(storage_path('app/'), $this->faker->image(config('filesystems.disks.public.root'). '/images')));
        $this->faker->addProvider(new FakerPicsumImagesProvider($this->faker));
        return [
            'path' => Str::remove(storage_path('app/'), $this->faker->image(config('filesystems.disks.public.root'). '/images')),
        ];
    }
}
