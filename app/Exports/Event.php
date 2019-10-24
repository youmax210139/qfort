<?php

namespace App\Exports;

class Event extends BaseExport
{
    protected $model = 'App\Models\Event';

    public function headings(): array
    {
        return [
            "id",
            "title",
            "abstract",
            "email",
            "image",
            "telephone",
            "location",
            "opento",
            "content",
            "price",
            "alwaysTop",
            "pintop_from",
            "pintop_to",
            "published_from",
            "published_to",
            "created_at",
            "updated_at",
        ];
    }

}
