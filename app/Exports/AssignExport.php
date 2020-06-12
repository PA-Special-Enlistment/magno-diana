<?php

namespace App\Exports;

use App\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;

class AssignExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Staff::select('last_name', 'first_name', 'middle_name', 'equipment.type', 'count', 'assign_date', 'code')
                    ->leftJoin('assign', 'staff.id', 'assign.staff_id')
                    ->leftJoin('equipment', 'assign.equipment_id', '=', 'equipment.id')
                    ->get();
    }
}
