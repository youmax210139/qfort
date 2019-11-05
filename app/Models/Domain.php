<?php

namespace App\Models;

use App\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use TCG\Voyager\Traits\Translatable;

class Domain extends Model implements Sortable
{
    use SortableTrait;
    use Paginatable;
    use Translatable;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $translatable = ['title', 'subTitle', 'description'];

    public function peoples()
    {
        return $this->belongsToMany(People::class, 'people_domains', 'domain_id', 'people_id');
    }

    public function researches()
    {
        return $this->belongsToMany(Research::class, 'research_domains', 'domain_id', 'research_id');
    }

    public function getAbstractAttribute()
    {
        return str_limit(
            $this->getTranslatedAttribute('description', app()->getLocale())
        , 220, '...');
    }

    public function getLinkAttribute()
    {
        return route('web.researches.domains.detail', $this->id);
    }
}
