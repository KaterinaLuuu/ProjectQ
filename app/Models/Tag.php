<?php

namespace App\Models;

use App\Events\TagCreated;
use App\Events\TagDeleted;
use App\Events\TagUpdate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function articles()
    {
        return $this->morphedByMany(Article::class, "taggable");
    }

    protected $dispatchesEvents = [
        'created' => TagCreated::class,
        'updated' => TagUpdate::class,
        'deleted' => TagDeleted::class
    ];
}
