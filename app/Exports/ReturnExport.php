<?php

namespace App\Exports;

use App\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReturnExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Staff::select('last_name', 'first_name', 'middle_name', 'equipment.type', 'count', 'date_return', 'code', 'remarks')
                    ->leftJoin('return', 'staff.id', 'return.staff_id')
                    ->leftJoin('equipment', 'return.equipment_id', '=', 'equipment.id')
                    ->get();
    }
}
