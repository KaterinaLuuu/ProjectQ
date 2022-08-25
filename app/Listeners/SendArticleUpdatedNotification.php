<?php

namespace App\Listeners;

use App\Events\ArticleUpdate;
use App\Mail\ArticleUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleUpdatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ArticleUpdate  $event
     * @return void
     */
    public function handle(ArticleUpdate $event)
    {
        if($email = config('mail.site_admin.email')){
            \Mail::to($email)->send(
                new ArticleUpdated($event->article)
            );
        }
    }
}
