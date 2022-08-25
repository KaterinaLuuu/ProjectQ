<?php

namespace App\Repositories;

use App\Contracts\StatisticsRepositoryContract;
use App\Models\Article;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StatisticsRepository implements StatisticsRepositoryContract
{

    public function getCountCar(): int
    {
        return Car::query()->count();
    }

    public function getCountArticle(): int
    {
        return Article::query()->count();
    }

    public function mostRepeatedTag(): Model
    {
        return Tag::withCount('articles')->orderBy('articles_count', 'DESC')->first();
    }

    public function longArticle(): Model
    {
        return Article::query()->orderBy(DB::raw('LENGTH(body)'), 'DESC')->first();
    }

    public function shortArticle(): Model
    {
        return Article::query()->orderBy(DB::raw('LENGTH(body)'))->first();

    }

    public function averageNumberOfTags(): int
    {
        return Tag::withCount('articles')->havingRaw('articles_count > 0')->avg('articles_count');
    }

    public function mostTaggedNews(): Model
    {
        return Article::withCount('tags')->orderBy('tags_count', 'DESC')->first();
    }




}
