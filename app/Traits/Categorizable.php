<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use ReflectionClass;

trait Categorizable
{
    public function categories()
    {
        $reflection = new ReflectionClass(self::class);
        $classname = strtolower($reflection->getShortName());
        return $this->belongsToMany('App\Models\Category', $classname . '_categories', $classname . '_id', 'category_id');
    }

    public function scopeOfCategory($query, $name)
    {
        if (empty($name)) {
            return $query;
        }
        return $query->whereHas('categories', function (Builder $query) use ($name) {
            $query->where('name', $name);
        });
    }

    public function getFirstCategoryAttribute()
    {
        if (request()->c && $c = $this->categories()->where('name', urldecode(request()->c))->first()) {
            return $c->name;
        }
        return $this->categories()->first()->name ?? '-';
    }
}
