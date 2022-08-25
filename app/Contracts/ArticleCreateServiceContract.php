<?php

namespace App\Contracts;

interface ArticleCreateServiceContract
{
    public function createArticle(array $data, $tagRequest, $photo);
}
