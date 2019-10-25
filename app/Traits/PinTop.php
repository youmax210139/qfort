<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait PinTop
{
    public static function getPinTop(Builder $base, $count = 6)
    {
        $query_base  = clone $base;
        $collection_always = $query_base->where('alwaysTop', 1)
            ->orderBy('updated_at', 'desc');
        if ($count != null) {
            $collection_always = $collection_always->limit($count);
        }
        $collection_always = $collection_always->get();

        $query_base  = clone $base;
        $collection_pintop = $query_base->where([
            ['pintop_from', '<=', now()],
            ['pintop_to', '>=', now()],
        ])->orderBy('updated_at', 'desc');

        if ($count != null && $collection_always->count() < $count) {
            $collection_pintop = $collection_pintop->limit($count - $collection_always->count());
        }
        $collection_pintop = $collection_pintop->get();

        $collection_always = $collection_always->concat($collection_pintop);

        $query_base  = clone $base;
        $collection = $query_base->whereNotIn('id', $collection_always->pluck('id')->toArray())
            ->orderBy('updated_at', 'desc');
        if ($count != null && $collection_always->count() < $count) {
            $collection =  $collection->limit($count - $collection_always->count());
        }
        $collection = $collection->get();
        $collection_always = $collection_always->concat($collection);
        return $collection_always;
    }
}
