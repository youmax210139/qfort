<?php

namespace App\Exports;

class Article extends BaseExport
{
    protected $model = 'App\Models\Article';

    public function headings(): array
    {
        return [
            "id",
            "title",
            "content",
            "image",
            "alwaysTop",
            "pintop_from",
            "pintop_to",
            "order",
            "user_id",
            "created_at",
            "updated_at",
        ];
    }
}
