<?php

namespace App\Models;

use App\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use Paginatable;

    protected $fillable = [
        'email',
        'name',
        'area',
        'country',
        'jobTitle',
        'organization',
    ];
}
