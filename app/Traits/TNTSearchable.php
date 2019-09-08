<?php

namespace App\Traits;

use Laravel\Scout\Searchable;
use TeamTNT\TNTSearch\TNTSearch;

trait TNTSearchable
{
    use Searchable;

    public function toSearchableArray()
    {
        return array_except($this->toArray(), ['created_at', 'update_at', 'image', 'email']);
    }

    public function getHighlightAttribute()
    {
        $search = request()->search;
        if (empty($search)) {
            return '';
        }
        $tnt = new TNTSearch();
        foreach ($this->toSearchableArray() as $key => $s) {
            if ($key == 'title') {
                continue;
            } elseif ($pos = strpos($s, $search)) {
                return substr($tnt->highlight(e($s), $search, 'em', ['wholeWord' => true]), $pos - 4, 95);
            }
        }
        return $this->abstract;
    }

    public function getHighlightTitleAttribute()
    {
        $search = request()->search;
        $tnt = new TNTSearch();
        return $tnt->highlight(e($this->title), $search, 'em', ['wholeWord' => true]);
    }
}
