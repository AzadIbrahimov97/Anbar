<?php

namespace App\Exports;

use App\Models\departments;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exportdepartments implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return departments::all();
    }
}
