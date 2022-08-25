<?php

namespace App\Providers;

use App\Contracts\ArticleCreateServiceContract;
use App\Contracts\ArticleUpdateServiceContract;
use App\Contracts\BannerRepositoryContract;
use App\Contracts\SalonsClientRepositoryContract;
use App\Contracts\SalonsClientServiceContract;
use App\Contracts\StatisticsRepositoryContract;
use App\Contracts\StatisticsServiceContract;
use App\Repositories;
use App\Services\ArticleCreateService;
use App\Services\ArticleUpdateService;
use App\Services\SalonsClientService;
use App\Services\StatisticsService;
use Illuminate\Support\ServiceProvider;
use App\Services\TagsSynchronizer;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\App\Contracts\ArticlesRepositoryContract::class, Repositories\ArticlesRepository::class);
        $this->app->singleton(\App\Contracts\CarsRepositoryContract::class, Repositories\CarsRepository::class);
        $this->app->singleton(\App\Contracts\TagsRepositoryContract::class, Repositories\TagsRepository::class);
        $this->app->singleton(\App\Contracts\TagsSynchronizerContract::class, TagsSynchronizer::class);
        $this->app->singleton(\App\Contracts\CategoryRepositoryContract::class, Repositories\CategoryRepository::class);
        $this->app->singleton(\App\Contracts\ImagesRepositoryContract::class, Repositories\ImagesRepository::class);
        $this->app->singleton(ArticleUpdateServiceContract::class, ArticleUpdateService::class);
        $this->app->singleton(ArticleCreateServiceContract::class, ArticleCreateService::class);
        $this->app->singleton(BannerRepositoryContract::class, Repositories\BannerRepository::class);
        $this->app->singleton(StatisticsServiceContract::class, StatisticsService::class);
        $this->app->singleton(StatisticsRepositoryContract::class, Repositories\StatisticsRepository::class);
        $this->app->singleton(SalonsClientServiceContract::class, function () {
            return new SalonsClientService(config('auth.basic_auth.login'),
            config('auth.basic_auth.password'), config('app.qsoft_url'));
        });
        $this->app->singleton(SalonsClientRepositoryContract::class, Repositories\SalonsClientRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
