<?php

namespace App\Models;

use App\Traits\BreadScope;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use BreadScope;

    public function user()
    {
        return $this->hasOneThrough(
            'App\User', 
            'App\Models\People',
            'id', // Foreign key on users table...
            'id', // Foreign key on history table...
            'people_id', // Local key on suppliers table...
            'user_id' // Local key on users table...
        );
    }

    public function people()
    {
        return $this->belongsTo('App\Models\People', 'people_id');
    }
}
