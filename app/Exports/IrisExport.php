<?php

namespace App\Exports;

use App\Models\IrisImport;

use Maatwebsite\Excel\Concerns\FromCollection;

class IrisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IrisImport::all();
    }
    public function headings(): array
    {
        // Define the headers for the iris table export
        return [
           'Id' ,'Sepal Length', 'Sepal Width', 'Petal Length', 'Petal Width', 'Species',
        ];
    }
}
