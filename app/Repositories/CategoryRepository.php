<?php

namespace App\Repositories;

use App\Contracts\CategoryRepositoryContract;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryContract
{
    private Category $category;
    private $tag = 'category';

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategories(): Collection
    {
        return \Cache::tags($this->tag)->remember('categories', 3600, function () {
            return $this->category->withDepth()->having('depth', '<', 2)->get()->sortBy('sort')->toTree();
        });
    }

    public function getLinksBySlug(string $slug): array
    {
        return \Cache::tags($this->tag)->remember($slug, 3600, function () use ($slug) {
            return $this->category->ancestorsAndSelf($this->category->where('slug', $slug)->first()->id)
                ->pluck('id')->toArray();
        });
    }

    public function findById($id)
    {
        return \Cache::tags($this->tag)->remember('categories_by_id_' . $id, 3600, function () use ($id) {
            return $this->category->find($id);
        });
    }
}
