<?php

namespace App\Exports;

use App\Planes_reservation;
use Maatwebsite\Excel\Concerns\FromCollection;

class PlanesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Planes_reservation::all();
    }
}
