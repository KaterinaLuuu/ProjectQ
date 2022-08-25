<?php

namespace App\Http\Controllers;

use App\Contracts\CarsRepositoryContract;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarsResource;
use App\Models\Car;
use Illuminate\Http\JsonResponse;

class CarsResourceController extends Controller
{

    public function __construct()
    {
        $this->middleware('shield');
    }

    public function index(CarsRepositoryContract $carsRepository)
    {
        return response()->json(CarsResource::collection($carsRepository->getCars()));

    }

    public function store(CarRequest $carRequest, CarsRepositoryContract $carsRepository)
    {
        $data = $carRequest->validated();
        $car = $carsRepository->create($data);
        return new JsonResponse(['success' => true, 'car_id' => $car->id], headers: ['Content-type'=> 'application/json',
            'Accept' => 'application/json']);
    }

    public function update($id, CarRequest $carRequest, CarsRepositoryContract $carsRepository)
    {
        $data = $carRequest->validated();
        $car = $carsRepository->update($id, $data);
        return new JsonResponse(['success' => true, 'car_id' => $id], headers: ['Content-type'=> 'application/json',
            'Accept' => 'application/json']);
    }

    public function destroy(Car $car, CarsRepositoryContract $carsRepository)
    {
        $carsRepository->delete($car);
        return new JsonResponse(['success' => true], headers: ['Content-type'=> 'application/json',
            'Accept' => 'application/json']);
    }
}
