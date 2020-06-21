<?php

namespace App\Exports;

use App\Assign;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class AssignExport implements FromCollection, withHeadings, ShouldAutoSize, withEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    function __construct($id) {
            $this->id = $id;
    }

    public function collection()
    {
        return Assign::select('code', 'last_name', 'first_name', 'middle_name', 'equipment.type', 'count', 'assign_date')
                    ->where('staff.id', '=', $this->id)
                    ->leftJoin('staff', 'staff.id', 'assign.staff_id')
                    ->leftJoin('equipment', 'assign.equipment_id', '=', 'equipment.id')
                    ->get();
    }

    public function headings(): array{
        return [
            'Code',
            'Last Name',
            'First Name',
            'Middle Name',
            'Suffix Name',
            'Type of Equipment',
            'Date Assign',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13)->setBold(true);
            },
        ];
    }
}
