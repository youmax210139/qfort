<?php

namespace App\Exports;

use App\Models\Article as Model;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class Article implements FromQuery
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function forIds(array $ids)
    {
        $this->ids = $ids;

        return $this;
    }

    public function query()
    {
        return Model::query()->whereIn('id', $this->ids);
    }

}
