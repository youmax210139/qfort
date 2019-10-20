<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;

class Carousel extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

    use SortableTrait;

    protected $appends = [
        'source',
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
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
