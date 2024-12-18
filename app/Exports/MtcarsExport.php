<?php

namespace App\Exports;


use App\Models\MtcarsImport;
use Maatwebsite\Excel\Concerns\FromCollection;

class MtcarsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MtcarsImport::all();
    }
}
