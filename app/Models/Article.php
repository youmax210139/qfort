<?php

namespace App\Models;

use Auth;
use App\Traits\BreadScope;
use App\Traits\TNTSearchable;
use App\Traits\Categorizable;
use App\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use BreadScope;
    use Categorizable;
    use Paginatable;
    use TNTSearchable;

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
        return str_limit($this->content, 95, '...');
    }

    public function getLinkAttribute()
    {
        return route('web.news.detail', $this->id);
    }
}
