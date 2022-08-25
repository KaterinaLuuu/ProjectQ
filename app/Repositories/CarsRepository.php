<?php

namespace App\Repositories;

use App\Contracts\CarsRepositoryContract;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CarsRepository implements CarsRepositoryContract
{
    private Car $model;
    private $tag = 'cars';

    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    public function getCars(): Collection
    {
        return \Cache::tags($this->tag)->remember('getCars', 3600, function () {
            return $this->model->query()->get();
        });
    }

    public function getFirstCarById(int $id): Model
    {
        return \Cache::tags([$this->tag, 'images'])->remember($id, 3600, function () use ($id) {
            return $this->model->query()->where('id', $id)->with(['carBody', 'carClass', 'carEngine', 'images'])->first();
        });
    }

    public function getNewCars ($limit): Collection
    {
        return \Cache::tags($this->tag)->remember($limit, 3600, function () use ($limit) {
            return $this->model->query()->limit($limit)->latest('is_new')->get();
        });
    }

    public function carPaginate($page, $perPage = 16)
    {
        $key = 'page_' . $page . '_perPage_' . $perPage;
        return \Cache::tags($this->tag)->remember($key, 3600, function () use ($page, $perPage) {
            return $this->model->query()->paginate($perPage, page: $page);
        });

    }

    public function getByCategory(string $category, int $count = 0): mixed
    {
        $key = 'category_' . $category . '_count_' . $count;

        return \Cache::tags($this->tag)->remember($key, 3600, function () use ($category, $count) {
            $category_id = Category::where('slug', $category)->get()[0]->id;

            $categories = Category::where('id', $category_id)->orWhere('parent_id', $category_id)->get();

            $cars = $this->model->query();

            foreach ($categories as $category) {
                $cars = $cars->orWhere('category_id', $category->id);
            }

            return $count ? $cars->paginate($count) : $cars->get();
        });
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete(Car $car)
    {
        $car->delete();
    }
}
