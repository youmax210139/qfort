<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'email',
        'name',
        'area',
        'country',
        'jobTitle',
        'organization',
    ];
}
