<?php

namespace App\Models;

use App\Traits\BreadScope;
use App\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use TCG\Voyager\Traits\Translatable;

class Research extends Model
{
    use Paginatable;
    use SortableTrait;
    use BreadScope;
    use Translatable;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $translatable = ['title', 'subTitle', 'content'];

    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'research_domains', 'research_id', 'domain_id');
    }

    public function getAbstractAttribute()
    {
        return str_limit(strip_tags(
            $this->getTranslatedAttribute('content', app()->getLocale())
        ), 150, '...');
    }

    public function getLinkAttribute()
    {
        return route('web.researches.detail', $this->id);
    }
}
