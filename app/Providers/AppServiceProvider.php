<?php

namespace App\Providers;

use App\Contracts\CategoryRepositoryContract;
use App\Contracts\SalonsClientRepositoryContract;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', function ($view) {
            $categoryRepository = $this->app->make(CategoryRepositoryContract::class);
            $categories = $categoryRepository->getCategories();
            $slug = $this->getCurrentRequest()->route();

            $hightlighted_id = null;

            if (isset($slug->parameters['category'])) {
                $hightlighted_id = $categoryRepository->getLinksBySlug($slug->parameters['category']);
            }

            $view->with(['categories' => $categories, 'hightlightedId'=>$hightlighted_id]);
        });

        View::composer('layouts.app',function ($view) {
            $salonsClientRepository = $this->app->make(SalonsClientRepositoryContract::class);
            $randSalons = $salonsClientRepository->footerSalons(2, 'in_random_order');
            $view->with(['randSalons' => $randSalons]);
        });

        Blade::if('admin', function() {
            return auth()->check() && auth()->user()->isAdmin();
        });

    }
}
