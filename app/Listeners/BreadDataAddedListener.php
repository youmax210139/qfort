<?php

namespace App\Listeners;

use TCG\Voyager\Events\BreadDataAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreation;

class BreadDataAddedListener
{
    /**
     * Handle the event.
     *
     * @param  \TCG\Voyager\Events\BreadDataAdded  $event
     * @return void
     */
    public function handle(BreadDataAdded $event)
    {
        switch($event->dataType->name){
            case 'users':
                info($event->data);
                $to = [
                    [
                        'email' => $event->data->email,
                        'name' => $event->data->name,
                    ],
                ];
                try{
                    Mail::to($to)->send(new UserCreation($event->data, request()->all()));
                }
                catch(\Exception $e){}
            break;
        }
    }
}
