<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    public function getAbstractAttribute()
    {
        return str_limit($this->description, 220, '...');
    }
}
