<?php

namespace App\Repositories;

use App\Contracts\TagsRepositoryContract;
use App\Models\Tag;

class TagsRepository implements TagsRepositoryContract
{
    private Tag $model;
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }

    public function firstOrCreate(array $tag): Tag
    {
        return $this->model->firstOrCreate($tag);
    }
}
