<?php

namespace App\Repositories;

use App\Contracts\BannerRepositoryContract;
use App\Models\Banner;

class BannerRepository implements BannerRepositoryContract
{
    private Banner $model;

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

    public function getRandomBanner($limit)
    {
        return \Cache::tags('banner')->remember($limit, 3600, function () use ($limit) {
            return $this->model->query()
                ->limit($limit)
                ->inRandomOrder()
                ->get();
        });
    }
}
