<?php

namespace App\Exports;

class Guest extends BaseExport
{
    protected $model = 'App\Models\Guest';

    public function headings(): array
    {
        return [
            "id",
            "name",
            "email",
            "jobTitle",
            "organization",
            "area",
            "country",
            "telephone",
            "created_at",
            "updated_at",
        ];
    }


}
