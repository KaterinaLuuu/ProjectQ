<?php

namespace App\Contracts;

use App\Models\Tag;

interface TagsRepositoryContract
{
    public function firstOrCreate(array $tag): Tag;
}
