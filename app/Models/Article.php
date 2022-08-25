<?php

namespace App\Models;

use App\Events\ArticleCreated;
use App\Events\ArticleDeleted;
use App\Events\ArticleUpdate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model implements HasTagsContract
{
    use HasFactory;
    protected $guarded = [""];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, "taggable");
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    protected $dispatchesEvents = [
        'created' => ArticleCreated::class,
        'updated' => ArticleUpdate::class,
        'deleted' => ArticleDeleted::class
    ];
}
