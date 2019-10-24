<?php

namespace App\Exports;

class Carousel extends BaseExport
{
    protected $model='App\Models\Carousel';

    public function headings(): array
    {
        return [
            "file",
            "id",
            "title",
            "caption",
            "link",
            "type",
            "status",
            "order",
            "created_at",
            "updated_at",
        ];
    }

}
