<?php

namespace App\Traits;

use Illuminate\Support\Str;
use ReflectionClass;

trait Paginatable
{
    // protected $perPage = 5;

    public function getPerPage(){
        return 5;
    }

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
            return 'News';
        } else {
            return $reflection->getShortName();
        }
    }

    protected function getRouteUrl($id)
    {
        $name = strtolower(Str::plural($this->classBaseName));
        return route("web.$name.detail", $id);
    }

    /**
     * Build the URL to sort data type by this field.
     *
     * @return string Built URL
     */
    public function sortByUrl($orderBy, $sortOrder)
    {
        $params = [];
        $isDesc = $sortOrder != 'asc';
        if ($isDesc) {
            $params['sort_order'] = 'asc';
        } else {
            $params['sort_order'] = 'desc';
        }
        $params['order_by'] = $orderBy;

        return url()->current().'?'.http_build_query(array_merge(\Request::all(), $params));
    }
}
