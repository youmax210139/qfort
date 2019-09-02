<?php

namespace App\Models;

use Storage;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use Categorizable;
    protected $table = 'peoples';

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'people_categories', 'people_id', 'category_id');
    }

    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'people_domains', 'people_id', 'domain_id');
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

}
