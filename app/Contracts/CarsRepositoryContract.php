<?php

namespace App\Contracts;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CarsRepositoryContract
{
    public function create($data);

    public function update($id, $data);

    public function delete(Car $car);

    public function getCars(): Collection;

    public function getFirstCarById(int $id): Model;

    public function getNewCars ($limit): Collection;

    public function carPaginate($page, $perPage = 16);

    public function getByCategory(string $category, int $count = 0): mixed;
}
