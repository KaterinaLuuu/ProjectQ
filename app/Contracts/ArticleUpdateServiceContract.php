<?php

namespace App\Contracts;

use App\Models\Article;

interface ArticleUpdateServiceContract
{
    public function updateArticle(Article $article, array $data, $tagRequest, $photo): bool;
}
