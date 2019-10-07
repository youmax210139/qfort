<?php

namespace App\Models;

use App\Traits\BreadScope;
use App\Traits\Categorizable;
use App\Traits\Paginatable;
use App\Traits\PinTop;
use App\Traits\TNTSearchable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use BreadScope;
    use Categorizable;
    use Paginatable;
    use TNTSearchable;
    use PinTop;

    public function getUserIdBrowseAttribute()
    {
        return $this->user->name;
    }

    public function getUserIdReadAttribute()
    {
        return $this->user->name;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getAbstractAttribute()
    {
        return str_limit(substr($this->content, 3, -4), 200, '...');
    }

    public function getLinkAttribute()
    {
        return route('web.news.detail', $this->id);
    }
}
