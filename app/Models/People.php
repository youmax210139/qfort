<?php

namespace App\Models;

use Storage;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class People extends Model
{
    use Searchable;
    use Categorizable;
    
    protected $table = 'peoples';

    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'people_domains', 'people_id', 'domain_id');
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
        $file = json_decode($this->resume)[0]->download_link??'';
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
