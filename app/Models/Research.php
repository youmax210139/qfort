<?php

namespace App\Models;

use App\Traits\TNTSearchable;
use App\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use Paginatable;
    use TNTSearchable;

    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'research_domains', 'research_id', 'domain_id');
    }

    public function getAbstractAttribute()
    {
        return str_limit($this->content, 95, '...');
    }

    public function getLinkAttribute()
    {
        return route('web.researches.detail', $this->id);
    }
}
