<?php

namespace App\Traits;

use Auth;
use Illuminate\Database\Eloquent\Builder;

trait BreadScope
{
    public function scopeCurrentUser($query)
    {
        if (Auth::user()->hasRole('user')) {
            return $query->whereHas('user', function (Builder $query) {
                $query->where('user_id', Auth::user()->id);
            });
        }
    }
}
