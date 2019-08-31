<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Categorizable;
    protected $appends = [
        'publish_date',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'event_categories', 'event_id', 'category_id');
    }

    public function getPublishDateAttribute()
    {
        return [
            'from' => Carbon::parse($this->published_from),
            'to ' => Carbon::parse($this->published_to),
        ];
    }
}
