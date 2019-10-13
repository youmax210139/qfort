<?php

namespace App\Models;

use App\Traits\BreadScope;
use App\Traits\Categorizable;
use App\Traits\TNTSearchable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Storage;

class People extends Model
{
    use BreadScope;
    use Categorizable;
    use TNTSearchable;
    use SortableTrait;

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

    public function getTitleAttribute()
    {
        return $this->name . ' ' . $this->fullDomain;
    }

    public function getAbstractAttribute()
    {
        return str_limit($this->content, 95, '...');
    }

    public function getFullDomainAttribute()
    {
        return implode(',', $this->domains()->pluck('title')->toArray());
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
