<?php

namespace App\Exports;

class Subscription extends BaseExport
{
    protected $model = 'App\Models\Subscription';

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
            "created_at",
            "updated_at",
        ];
    }


}
