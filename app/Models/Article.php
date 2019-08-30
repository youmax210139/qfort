<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function scopeCurrentUser($query)
    {
        if (Auth::user()->role->name == 'admim') {
            return $query;
        }
        return $query->where('user_id', Auth::user()->id);
    }

    public function getAbstractAttribute()
    {
        return str_limit($this->content, 95, '...');
    }
}
