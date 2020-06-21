<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements FromCollection, withHeadings, ShouldAutoSize, withEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id', 'last_name', 'first_name', 'middle_name', 'suffix_name', 'birthdate', 'email', 'mobile_number', 'designation', 'isAdmin')->get();
    }

    public function headings(): array{
        return [
            'No',
            'Last Name',
            'First Name',
            'Middle Name',
            'Suffix Name',
            'Date of Birth',
            'Email',
            'Mobile Number',
            'Designation',
            'Is Admin'
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
