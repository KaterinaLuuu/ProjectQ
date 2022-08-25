<?php

namespace App\Models;

use App\Events\CarCreated;
use App\Events\CarDeleted;
use App\Events\CarUpdate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [""];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function carBody()
    {
        return $this->belongsTo(CarBody::class);
    }

    public function carClass()
    {
        return $this->belongsTo(CarClass::class);
    }

    public function carEngine()
    {
        return $this->belongsTo(CarEngine::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class)->withPivot("image_id", "image_id");
    }

    protected $dispatchesEvents = [
        'created' => CarCreated::class,
        'updated' => CarUpdate::class,
        'deleted' => CarDeleted::class
    ];
}
