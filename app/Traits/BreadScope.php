<?php

namespace App\Traits;

use Auth;
use Illuminate\Database\Eloquent\Builder;

trait BreadScope
{
    public function scopeCurrentUser($query)
    {
        if (Auth::user()->hasRole('user')) {
            return $query->whereHas('user', function (Builder $query) {
                $query->where('user_id', Auth::user()->id);
            });
        }
    }

    public function getContentBrowseAttribute()
    {
        return str_limit(strip_tags($this->content), 40, '...');
    }

    public function getTitleBrowseAttribute()
    {
        return str_limit(strip_tags($this->title), 20, '...');
    }

    public function getSubTitleBrowseAttribute()
    {
        return str_limit(strip_tags($this->subtitle), 20, '...');
    }

    public function getAbstractBrowseAttribute()
    {
        return str_limit(strip_tags($this->abstract), 20, '...');
    }

    public function getAlwaysTopBrowseAttribute()
    {
        return $this->alwaysTop?'Y':'N';
    }
}
