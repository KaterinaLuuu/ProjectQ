<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface HasTagsContract
{
    public function tags(): MorphToMany;
}
