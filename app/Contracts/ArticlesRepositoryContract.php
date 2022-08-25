<?php

namespace App\Contracts;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ArticlesRepositoryContract
{
    public function articleNewPublished($limit): Collection;

    public function getArticles(): Collection;

    public function create(array $data): Article;

    public function update(Article $article, array $data): bool;

    public function delete(Model $model): ?bool;

    public function articlePaginate($page, $perPage = 5);
}
