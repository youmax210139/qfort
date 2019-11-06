<?php

namespace App\Models;

use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Models\MenuItem as Model;

class MenuItem extends Model
{
    use Translatable;
    protected $translatable = ['title'];
}
