<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "slug" => $this->faker->unique()->slug,
            "title" => $this->faker->sentence(),
            "description" => $this->faker->sentence(),
            "body" => $this->faker->sentence(),
            "published_at" => (bool) rand(0, 1) ? $this->faker->dateTimeThisMonth() : null,
            "image_id" => Image::factory(),
        ];
    }
}
