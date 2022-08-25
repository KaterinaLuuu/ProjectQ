<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface StatisticsRepositoryContract
{
    public function getCountCar(): int;

    public function getCountArticle(): int;

    public function mostRepeatedTag(): Model;

    public function longArticle(): Model;

    public function shortArticle(): Model;

    public function averageNumberOfTags(): int;

    public function mostTaggedNews(): Model;

}
