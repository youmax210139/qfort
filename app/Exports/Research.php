<?php

namespace App\Exports;

class Research extends BaseExport
{
    protected $model = 'App\Models\Research';

    public function headings(): array
    {
        return [
            "id",
            "title",
            "subTitle",
            "image",
            "content",
            "order",
            "created_at",
            "updated_at",
        ];
    }

}
