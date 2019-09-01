<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
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
        return str_limit($this->description, 220, '...');
    }
}
