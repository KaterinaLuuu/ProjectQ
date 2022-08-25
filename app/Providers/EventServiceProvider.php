<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events;
use App\Listeners;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Events\ArticleCreated::class => [
            Listeners\ArticleCacheFlush::class,
            Listeners\SendArticleCreatedNotification::class,
        ],
        Events\ArticleUpdate::class => [
            Listeners\ArticleCacheFlush::class,
            Listeners\SendArticleUpdatedNotification::class,
        ],
        Events\ArticleDeleted::class => [
            Listeners\ArticleCacheFlush::class,
            Listeners\SendArticleDeletedNotification::class,
        ],
        Events\CarCreated::class => [
            Listeners\CarCacheFlush::class,
        ],
        Events\CarUpdate::class => [
            Listeners\CarCacheFlush::class,
        ],
        Events\CarDeleted::class => [
            Listeners\CarCacheFlush::class,
        ],
        Events\TagCreated::class => [
            Listeners\TagCacheFlush::class,
        ],
        Events\TagUpdate::class => [
            Listeners\TagCacheFlush::class,
        ],
        Events\TagDeleted::class => [
            Listeners\TagCacheFlush::class,
        ],
        Events\ImageCreated::class => [
            Listeners\ImageCacheFlush::class,
        ],
        Events\ImageUpdate::class => [
            Listeners\ImageCacheFlush::class,
        ],
        Events\ImageDeleted::class => [
            Listeners\ImageCacheFlush::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
