<?php

namespace App\Models;

use App\Traits\Paginatable;
use App\Traits\BreadScope;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;

class Video extends Model
{
    use BreadScope;
    use SortableTrait;
    use Paginatable;

    protected $fillable = ['title', 'link', 'people_id'];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

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
