<?php

namespace App\Models;

use TCG\Voyager\Models\Setting as Model;
use TCG\Voyager\Events\SettingUpdated;
use TCG\Voyager\Traits\Translatable;

class Setting extends Model
{
    
    protected $table = 'settings';

    protected $guarded = [];

    public $timestamps = false;

    use Translatable;
    protected $translatable = ['value'];

    protected $dispatchesEvents = [
        'updating' => SettingUpdated::class,
    ];
}
