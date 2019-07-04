<?php

namespace App\Exports;

use App\Reparation;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReparationsExport implements FromCollection
{
    public function collection()
    {
        return Reparation::all();
    }
}