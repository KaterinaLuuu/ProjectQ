<?php

namespace App\Http\Controllers;

use App\Contracts\CarsRepositoryContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    private $carsRepository;
    private $page;

    public function __construct(CarsRepositoryContract $carsRepository, Request $request)
    {
        $this->carsRepository = $carsRepository;
        $this->page = is_null($request->page) ? 1 : $request->page;
    }
    public function index(): view
    {
        $cars = $this->carsRepository->carPaginate($this->page);
        return view('pages.catalog', compact('cars'));
    }

    public function show($id): view
    {
        $car = $this->carsRepository->getFirstCarById($id);
        return view('pages.products', compact('car'));
    }

    public function currentCatalog($slug)
    {
        $cars = $this->carsRepository->getByCategory($slug, 5);

        return view('pages.catalog', compact('cars'));
    }
}
