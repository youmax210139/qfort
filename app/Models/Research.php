<?php

namespace App\Models;

use App\Traits\BreadScope;
use App\Traits\TNTSearchable;
use App\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;

class Research extends Model
{
    use Paginatable;
    use TNTSearchable;
    use SortableTrait;
    use BreadScope;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'research_domains', 'research_id', 'domain_id');
    }

    public function getAbstractAttribute()
    {
        return str_limit(strip_tags($this->content), 300, '...');
    }

    public function getLinkAttribute()
    {
        return route('web.researches.detail', $this->id);
    }
}
