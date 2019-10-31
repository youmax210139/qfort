<?php

namespace App\Models;

use App\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use Paginatable;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'telephone',
        'message',
    ];
}
