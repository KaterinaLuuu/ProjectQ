<?php

namespace App\Http\Controllers;

use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\BannerRepositoryContract;
use App\Contracts\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function index(
        ArticlesRepositoryContract $articlesRepository,
        CarsRepositoryContract $carsRepository,
        BannerRepositoryContract $bannerRepository
    )
    {
        $articles = $articlesRepository->articleNewPublished(3);
        $cars = $carsRepository->getNewCars(4);
        $banners = $bannerRepository->getRandomBanner(3);

        return view('pages.homepage', compact('articles', 'cars', 'banners'));
    }

    public function about()
    {
        return view("pages.about");
    }

    public function contact()
    {
        return view("pages.contact");
    }

    public function termsOfSale()
    {
        return view("pages.termsOfSale");
    }

    public function financialDepartment()
    {
        return view("pages.financialDepartment");
    }

    public function forClients()
    {
        $cars = Car::query()->with(['carBody', 'carClass', 'carEngine'])->get();
        $averagePrice = $cars->average('price');
        $averagePriceWitsSale = $cars->filter->old_price->average('price');
        $maxPrice = $cars->max('price');
        $salon = $cars->pluck('salon')->unique();
        $engine = $cars->pluck('carEngine')->unique()->sortBy('name');
        $class = $cars->keyBy('carClass')->sortBy('name');

        $saleModel = $cars->filter(function ($car) {
            return $car->old_price !== null &&
                (Str::contains($car->name, "5") || Str::contains($car->name, "6")
                || Str::contains($car->carEngine->name, "5") || Str::contains($car->carEngine->name, "6")
                || Str::contains($car->kpp, "5") || Str::contains($car->kpp, "6"));
        });

        $bodies = $cars->whereNotNull('car_body_id')->mapToGroups(function ($car) {
            return [$car->carBody->name => $car->price];
        })->map(function ($car) {
            return $car->average();
        })->sort();

        return view("pages.forClients", compact('averagePrice', 'averagePrice',
            'averagePriceWitsSale','maxPrice', 'salon', 'engine', 'class', 'saleModel', 'bodies'));
    }
}
