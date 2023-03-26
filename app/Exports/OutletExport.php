<?php

namespace App\Exports;

use App\Models\Outlet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
;

class OutletExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Outlet::all();
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Nama Outlet',
            'Alamat',
            'Telepon',
            'Biaya Admin',
            'Created at'
        ];
    }
    
public function registerEvents(): array
{
    return [
        AfterSheet::class => function(AfterSheet $event) {
            // Mendefinisikan rentang sel untuk header
            $event->sheet->getDelegate()->getStyle('A1:F1')->applyFromArray([
                'font' => [
                    'bold' => true, // Membuat font teks bold
                ]
            ]);
        },
    ];
}
}
