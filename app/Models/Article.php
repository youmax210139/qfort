<?php

namespace App\Models;

use App\Traits\BreadScope;
use App\Traits\Categorizable;
use App\Traits\Paginatable;
use App\Traits\PinTop;
use App\Traits\TNTSearchable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Article extends Model
{
    use BreadScope;
    use Categorizable;
    use Paginatable;
    //use TNTSearchable;
    use PinTop;
    use Translatable;

    protected $translatable = ['title', 'content'];

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
        return str_limit(strip_tags($this->content), 200, '...');
    }

    public function getLinkAttribute()
    {
        return route('web.news.detail', $this->id);
    }

    public function getContentBrowseAttribute()
    {
        return strip_tags($this->content);
    }
}
