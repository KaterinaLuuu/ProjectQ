<?php

namespace App\Repositories;

use App\Contracts\ImagesRepositoryContract;
use App\Models\Image;

class ImagesRepository implements ImagesRepositoryContract
{
    private Image $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function create(string $path)
    {
        return $this->image->create(['path' => $path]);
    }
}
