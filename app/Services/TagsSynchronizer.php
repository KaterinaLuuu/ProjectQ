<?php

namespace App\Services;

use App\Contracts\TagsRepositoryContract;
use App\Models\HasTagsContract;
use Illuminate\Support\Collection;
use App\Contracts\TagsSynchronizerContract;
use Illuminate\Support\Facades\DB;

class TagsSynchronizer implements TagsSynchronizerContract
{
    public function __construct(TagsRepositoryContract $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    public function sync(Collection $tags, HasTagsContract $model)
    {
        return DB::transaction(function() use($tags, $model) {
        $modelTags = $model->tags->keyBy("name");

        $tags = collect(explode(',', str_replace(" ", "", $tags->first())))->keyBy(fn($item) => $item)->except([""]);

        $syncIds = $modelTags->intersectByKeys($tags)->pluck("id")->toArray();

        $tagsToAttach = $tags->diffKeys($modelTags);
        foreach ($tagsToAttach as $tag) {
            $tag = $this->tagsRepository->firstOrCreate(["name" => $tag]);
            $syncIds[] = $tag->id;
        }

        $model->tags()->sync($syncIds);
        }, 5);
    }
}
