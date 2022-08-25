<?php

namespace App\Contracts;

use App\Models\Article;
use App\Models\Image;

interface ImageSynchronizerContract
{
    public function addImage(Image $image, Article $article);

}
