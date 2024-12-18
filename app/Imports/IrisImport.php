<?php

namespace App\Imports;

// use App\Models\Iris;
// use App\Models\IrisExport;
use App\Models\ExcelExport;
use Maatwebsite\Excel\Concerns\ToModel;

class IrisImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        return new ExcelExport([
            'id' => $row[5],
            'sepal_length' => $row[0],
            'sepal_width' => $row[1],
            'petal_length' => $row[2],
            'petal_width' => $row[3],
            'species' => $row[4],
        ]);
    }

}
