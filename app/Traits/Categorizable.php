<?php

namespace App\Traits;

trait Categorizable
{
    public function getFirstCategoryAttribute()
    {
        return $this->categories()->first()->name??'-';
    }
}
