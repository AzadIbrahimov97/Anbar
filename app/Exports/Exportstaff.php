<?php

namespace App\Exports;

use App\Models\staff;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exportstaff implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return staff::all();
    }
}
