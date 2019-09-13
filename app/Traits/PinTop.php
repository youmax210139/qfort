<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait PinTop
{
    public static function getPinTop(Builder $base, $count = 6)
    {
        $query_base  = clone $base;
        $collection = $query_base->where('alwaysTop', 1)
        ->orderBy('updated_at', 'desc')
        ->limit($count)->get();
        if ($collection->count() < $count) {
            $query_base  = clone $base;
            $collection = $query_base->where([
                ['pintop_from', '<=', now()],
                ['pintop_to', '>=', now()],
            ])
            ->orderBy('updated_at', 'desc')
            ->limit($count- $collection->count())->get();
        }
        if ($collection->count() < $count) {
            $query_base  = clone $base;
            $collection = $collection->concat(
                $query_base->whereNotIn('id', $collection->pluck('id')->toArray())
                    ->orderBy('updated_at', 'desc')
                    ->limit($count - $collection->count())
                    ->get()
            );
        }
        return $collection;
    }
}
