<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $tags = Tag::get();
        $tags = Tag::factory()->count(5)->create();

        $publishArticles = Article::factory()->count(5)->sequence(fn ($sequence) => ['published_at' => $this->generateDate()])->create();
        $randomPublishArticles = Article::factory(10)->create();

        $articles = $publishArticles->merge($randomPublishArticles);

        $articles->each(function ($article) use ($tags) {
            $this->setTags($article, $tags);
        });
    }

    private function generateDate()
    {
        return Container::getInstance()->make(Generator::class)->dateTimeThisMonth();
    }

    private function setTags(Article $article, $tags)
    {
        $countTags = rand(1, 4);

        for ($i = 0; $i <= $countTags; $i++) {
            Article::find($article->id)
                ->tags()
                ->attach($tags->random());
        }
    }
}
