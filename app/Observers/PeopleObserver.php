<?php

namespace App\Observers;

use App\Models\People;
use Auth;

class PeopleObserver
{

    public function creating(People $people)
    {
        $people->user_id = Auth::user()->id;
    }
    /**
     * Handle the people "created" event.
     *
     * @param  \App\Models\People  $people
     * @return void
     */
    public function created(People $people)
    {

    }

    /**
     * Handle the people "updated" event.
     *
     * @param  \App\Models\People  $people
     * @return void
     */
    public function updated(People $people)
    {
        //
    }

    /**
     * Handle the people "deleted" event.
     *
     * @param  \App\Models\People  $people
     * @return void
     */
    public function deleted(People $people)
    {
        $people->domains()->detach();
        $people->categories()->detach();
        $people->videos()->delete();
    }

    /**
     * Handle the people "restored" event.
     *
     * @param  \App\Models\People  $people
     * @return void
     */
    public function restored(People $people)
    {
        //
    }

    /**
     * Handle the people "force deleted" event.
     *
     * @param  \App\Models\People  $people
     * @return void
     */
    public function forceDeleted(People $people)
    {
        //
    }
}
