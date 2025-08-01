<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Carbon\Carbon;

class PayrollExport5 implements FromArray, WithHeadings, WithTitle
{
    protected $data;
    protected $items;
    protected $gaji_owner;
    protected $gaji_admin;
    protected $pemasukan;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        $currentTime = Carbon::now();
        $export_data = [
            ['PENGGAJIAN Admin'],
            ['Nama Admin', 'Admin'],
            ['Per Tanggal', $currentTime],
            [],
            ['NO', 'Gaji Admin', 'Gaji Tanggal Awal', 'Gaji Tanggal Akhir']
        ];
        $totalGaji = 0;

        // Add the table data from $items
        foreach ($this->data as $index => $item) {
            $export_data[] = [
                $index + 1,
                $item->gaji_admin,
                date('l, d-m-Y H:i', strtotime($item->datestart)),
                date('l, d-m-Y H:i', strtotime( $item->dateend))
            ];

            $totalGaji+=$item->gaji_admin;
        }

        // Add salary details
        $export_data[] = [];
        $export_data[] = ['Gaji Total', number_format($totalGaji, 2, ',', '.')];

        return $export_data;
    }

    public function headings(): array
    {
        return [];
    }

    public function title(): string
    {
        return 'Payroll';
    }
}

?>