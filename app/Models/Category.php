<?php

namespace App\Models;

use App\Traits\Paginatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{
    use Translatable;
    use Paginatable;
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->orderBy('order', 'asc');
        });
    }

    protected $translatable = ['slug', 'name'];

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function getRelationshipFilter($options)
    {
        $type = explode('_', $options->pivot_table ?? '')[0] ?? null;
        $type = ($type != 'article') ? $type : 'new';
        return function ($item) use ($type) {
            return $item->type == $type;
        };
    }

    public function getLinkAttribute()
    {
        return request()->fullUrlWithQuery(['c' => $this->name]);
    }
}
