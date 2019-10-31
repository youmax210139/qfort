<?php

namespace App\Models;

use App\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use Paginatable;

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'jobTitle',
        'organization',
        'area',
        'country'
    ];

    protected $hidden = [
        'password'
    ];

    public function events()
    {
        return $this->belongsToMany('App\Models\Event', 'event_guests', 'guest_id', 'event_id');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
