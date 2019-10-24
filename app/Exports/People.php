<?php

namespace App\Exports;

class People extends BaseExport
{
    protected $model = 'App\Models\People';

    public function headings(): array
    {
        return [
            "id",
            "name",
            "email",
            "job",
            "area",
            "organization",
            "image",
            "content",
            "lab",
            "resume",
            "publication",
            "user_id",
            "order",
            "created_at",
            "updated_at",
        ];
    }
}
