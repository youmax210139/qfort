<?php

namespace App\Exports;

class Enquiry extends BaseExport
{
    protected $model='App\Models\Enquiry';

    public function headings(): array
    {
        return [
            "id",
            "email",
            "name",
            "subject",
            "telephone",
            "message",
            "created_at",
            "updated_at",
        ];
    }

}
