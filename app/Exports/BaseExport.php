<?php

namespace App\Exports;

use App\Models\People as Model;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

abstract class BaseExport implements FromQuery, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $model;

    public function forIds($ids)
    {
        $this->ids = $ids;

        return $this;
    }

    public function query()
    {
        $model = app($this->model)->select($this->headings());
        if($this->ids){
            $model = $model->whereIn('id', $this->ids);
        }
        return $model;
    }

    public function headings(): array
    {
        return [
            'id'
        ];
    }
}
