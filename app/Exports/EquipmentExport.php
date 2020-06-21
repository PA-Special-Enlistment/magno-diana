<?php

namespace App\Exports;

use App\Equipment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class EquipmentExport implements FromCollection, withHeadings, ShouldAutoSize, withEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Equipment::select('code', 'registration_date', 'type', 'name', 'count')->get();
    }

    public function headings(): array{
        return [
            'Code',
            'Registration Date',
            'Type of Equipment',
            'Brand',
            'Status'
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
