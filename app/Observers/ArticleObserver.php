<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\Subscription;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;

class ArticleObserver
{
    public function creating(Article $article)
    {
        $article->user_id = Auth::user()->id;
    }

    /**
     * Handle the article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        foreach (Subscription::all() as $s) {
            $to = [
                [
                    'email' => $s->email,
                    'name' => $s->name,
                ],
            ];
            try {
                Mail::to($to)->send(new Notification($article, $s));
            } catch (\Exception $e) { }
        }
    }

    /**
     * Handle the article "updated" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        //
    }

    /**
     * Handle the article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        $article->categories()->detach();
    }

    /**
     * Handle the article "restored" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the article "force deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //
    }
}
