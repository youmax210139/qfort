<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use App\Traits\Categorizable;
use App\Traits\Paginatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;

class Event extends Model
{
    use Categorizable;
    use Paginatable;
    use Spatial;
    use Searchable;
    
    protected $spatial = ['location'];

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
}
