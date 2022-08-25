<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryContract
{
    public function getCategories(): Collection;

    public function getLinksBySlug(string $slug): array;

    public function findById($id);
}
