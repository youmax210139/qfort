<?php

namespace App\Models;

use App\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use TCG\Voyager\Traits\Translatable;

class Carousel extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

    use SortableTrait;
    use Paginatable;
    use Translatable;

    protected $appends = [
        'source',
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $translatable = ['title', 'caption'];

    public function getSourceAttribute()
    {
        $source = json_decode($this->file);
        if (is_array($source)) {
            return $source[0]->download_link;
        }
        return $source;
    }
}
