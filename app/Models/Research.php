<?php

namespace App\Models;

use App\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use Paginatable;
    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'research_domains', 'research_id', 'domain_id');
    }

    public function getAbstractAttribute()
    {
        return str_limit($this->content, 95, '...');
    }
}
