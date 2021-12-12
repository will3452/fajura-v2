<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class SampleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return new Collection([
            [1, 2, 3],
            [4, 5, 6]
        ]);
    }
}
