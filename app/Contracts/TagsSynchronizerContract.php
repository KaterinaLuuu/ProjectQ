<?php

namespace App\Contracts;

use App\Models\HasTagsContract;
use Illuminate\Support\Collection;

interface TagsSynchronizerContract
{
    public function sync(Collection $tags, HasTagsContract $model);

}
