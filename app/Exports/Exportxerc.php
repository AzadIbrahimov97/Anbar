<?php

namespace App\Exports;

use App\Models\xerc;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exportxerc implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return xerc::all();
    }
}
