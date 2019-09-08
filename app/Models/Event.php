<?php

namespace App\Models;

use App\Traits\Categorizable;
use App\Traits\Paginatable;
use Carbon\Carbon;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\CalendarLinks\Link;
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

    protected $dates = [
        'published_from',
        'published_to',
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

    public function getICalAttribute()
    {
        $link = Link::create($this->title,
            $this->published_from,
            $this->published_to)
            ->description($this->abstract);
        // ->address('Samberstraat 69D, 2060 Antwerpen');
        return $link->ics();
    }
}
