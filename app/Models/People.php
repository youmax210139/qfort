<?php

namespace App\Models;

use App\Traits\Paginatable;
use App\Traits\BreadScope;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use TCG\Voyager\Traits\Translatable;
use Storage;

class People extends Model
{
    use BreadScope;
    use Categorizable;
    use SortableTrait;
    use Paginatable;
    use Translatable;

    protected $translatable = ['name', 'job', 'area', 'organization','content'];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $table = 'peoples';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'people_domains', 'people_id', 'domain_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'people_id', 'id');
    }

    public function getAbstractAttribute()
    {
        return str_limit($this->content, 95, '...');
    }

    public function getResearchAreaAttribute()
    {
        return str_replace(',', ' & ', $this->area);
    }

    public function getResumeLinkAttribute()
    {
        $file = json_decode($this->resume)[0]->download_link ?? '';
        if ($file) {
            return Storage::disk(config('voyager.storage.disk'))->url($file);
        }
        return '';
    }

    public function getLinkAttribute()
    {
        return route('web.peoples.detail', $this->id);
    }

}
