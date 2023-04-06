<?php

namespace App\Exports;

use App\Models\clients;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exportclients implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return clients::all();
    }
}
