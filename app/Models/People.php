<?php

namespace App\Models;

use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use Categorizable;
    protected $table = 'peoples';

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'people_categories', 'people_id', 'category_id');
    }

    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'people_domains', 'people_id', 'domain_id');
    }

    public function getFullDomainAttribute()
    {
        return implode(',', $this->domains()->pluck('title')->toArray());
    }
}
