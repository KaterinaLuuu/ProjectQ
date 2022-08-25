<?php

namespace App\Repositories;

use App\Contracts\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ArticlesRepository implements ArticlesRepositoryContract
{
    private Article $model;
    private $tag = 'articles';

    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function articleNewPublished($limit): Collection
    {
        return \Cache::tags($this->tag)->remember($limit, 3600, function () use ($limit) {
            return $this->model->query()
                ->limit($limit)
                ->latest('published_at')
                ->get();
        });
    }

    public function getArticles(): Collection
    {
        return \Cache::tags([$this->tag, 'tags', 'images'])->remember('all_article', 3600, function () {
            return $this->model->query()
                ->with(['tags', 'image'])
                ->latest('published_at')
                ->whereNotNull('published_at')
                ->get();
        });
    }

    public function create(array $data): Article
    {
        return $this->model->create($data);
    }

    public function update(Article $article, array $data): bool
    {
        return $article->update($data);
    }

    public function delete(Model $model): ?bool
    {
        return $model->delete();
    }

    public function articlePaginate($page, $perPage = 5)
    {
        $key = 'page_' . $page . '_perPage_' . $perPage;

        return \Cache::tags([$this->tag, 'tags', 'images'])->remember($key, 3600, function () use ($page, $perPage) {
            return $this->model
                ->with(['tags', 'image'])
                ->latest('published_at')
                ->whereNotNull('published_at')
                ->paginate($perPage, page: $page);
        });
    }
}
