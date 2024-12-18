<?php

namespace App\Imports;

use App\Models\Mtcars;
use Maatwebsite\Excel\Concerns\ToModel;

class MtcarsImport implements ToModel
{
    public function model(array $row)
    {
        return new MtcarsImport([
            'mpg' => $row[0],
            'cyl' => $row[1],
            'disp' => $row[2],
            'hp' => $row[3],
            'drat' => $row[4],
            'wt' => $row[5],
            'qsec' => $row[6],
            'vs' => $row[7],
            'am' => $row[8],
            'gear' => $row[9],
            'carb' => $row[10],
        ]);
    }
}
