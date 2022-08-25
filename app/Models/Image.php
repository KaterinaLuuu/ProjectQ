<?php

namespace App\Models;

use App\Events\ImageCreated;
use App\Events\ImageDeleted;
use App\Events\ImageUpdate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [""];

    public function car()
    {
        return $this->hasMany(Car::class);
    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function cars()
    {
        return $this->belongsTo(Car::class);
    }

    protected $dispatchesEvents = [
        'created' => ImageCreated::class,
        'updated' => ImageUpdate::class,
        'deleted' => ImageDeleted::class
    ];

}
