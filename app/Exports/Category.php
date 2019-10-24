<?php

namespace App\Exports;

class Category extends BaseExport
{
    protected $model='App\Models\Category';

    public function headings(): array
    {
        return [
            "id",
            "name",
            "type",
            "order",
            "created_at",
            "updated_at",
        ];
    }

}
