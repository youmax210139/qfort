<?php

namespace App\Models;

use App\Traits\Categorizable;
use App\Traits\Paginatable;
use Carbon\Carbon;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use TCG\Voyager\Traits\Spatial;

class Event extends Model
{
    use Categorizable;
    use Paginatable;
    use Spatial;
    use Searchable;
    use SpatialTrait;

    protected $spatialFields = [
        'location',
    ];

    public function getAbstractAttribute($value)
    {
        return str_limit($value, 95, '...');
    }

    public function getPublishDateAttribute()
    {
        return [
            'from' => Carbon::parse($this->published_from),
            'to ' => Carbon::parse($this->published_to),
        ];
    }

    public function getLinkAttribute()
    {
        return route('web.events.detail', $this->id);
    }

    public function getGoogleMapAttribute()
    {
        if ($this->location) {
            return 'https://www.google.com/maps/search/?api=1&query=' .
            $this->location->getLat() . ',' . $this->location->getLng();
        } else {
            return '';
        }
    }
}
