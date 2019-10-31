<?php

namespace App\Models;

use App\Traits\BreadScope;
use App\Traits\Categorizable;
use App\Traits\Paginatable;
use App\Traits\PinTop;
use Carbon\Carbon;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\CalendarLinks\Link;
use TCG\Voyager\Traits\Spatial;

class Event extends Model
{
    use Categorizable;
    use Paginatable;
    use Spatial;
    use SpatialTrait;
    use PinTop;
    use BreadScope;

    protected $spatialFields = [
        'location',
    ];

    protected $dates = [
        'published_from',
        'published_to',
        'pintop_from',
        'pintop_to',
    ];

    public $additional_attributes = ['registrants'];


    public function guests()
    {
        return $this->belongsToMany(Guest::class, 'event_guests', 'event_id', 'guest_id');
    }

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

    public function getICalLinkAttribute()
    {
        $link = Link::create(
            $this->title,
            $this->published_from,
            $this->published_to
        )
            ->description($this->abstract);
        // ->address('Samberstraat 69D, 2060 Antwerpen');
        return $link;
    }

    public function getRegistrantsDisplayAttribute()
    {
        return 'the number of registrants';
    }

    public function getRegistrantsAttribute()
    {
        return $this->guests()->count() ?? 0;
    }

}
