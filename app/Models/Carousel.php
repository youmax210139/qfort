<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'source',
    ];
    
    public function getSourceAttribute()
    {
        $source = json_decode($this->file);
        if (is_array($source)) {
            return $source[0]->download_link;
        }
        return $source;
    }
}
