<?php

namespace App\Traits;

use Illuminate\Support\Str;
use ReflectionClass;

trait Paginatable
{
    public function getPreviousAttribute()
    {
        return self::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }

    public function getNextAttribute()
    {
        return self::where('id', '>', $this->id)->first();
    }

    public function getPreviousLinkAttribute()
    {
        if (!$this->previous) {
            return '';
        }
        return $this->getRouteUrl($this->previous->id);
    }

    public function getNextLinkAttribute()
    {
        if (!$this->next) {
            return '';
        }
        return $this->getRouteUrl($this->next->id);
    }

    public function getIndexLinkAttribute()
    {
        $name = strtolower(Str::plural($this->classBaseName));
        return route("web.$name.index");
    }

    public function getClassBaseNameAttribute()
    {
        $reflection = new ReflectionClass(self::class);
        if (strtolower($reflection->getShortName()) == 'article') {
            return 'New';
        } else {
            return $reflection->getShortName();
        }
    }

    protected function getRouteUrl($id)
    {
        $name = strtolower(Str::plural($this->classBaseName));
        return route("web.$name.detail", $id);
    }
}
