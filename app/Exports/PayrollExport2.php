<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PayrollExport2 implements FromArray, WithHeadings, WithTitle
{
    protected $data;
    protected $items;
    protected $gaji_owner;
    protected $gaji_admin;
    protected $pemasukan;
    protected $gaji_drivers;

    public function __construct($data, $items, $gaji_owner, $gaji_admin, $pemasukan, $gaji_drivers)
    {
        $this->data = $data;
        $this->items = $items;
        $this->gaji_owner = $gaji_owner;
        $this->gaji_admin = $gaji_admin;
        $this->pemasukan = $pemasukan;
        $this->gaji_drivers = $gaji_drivers;
    }

    public function array(): array
    {
        $export_data = [
            ['PENGGAJIAN OWNER'],
            ['Nama Drivers', $this->data->rsDriver->nama_panggilan],
            ['Dari Tanggal', $this->data->datestart],
            ['Sampai Tanggal', $this->data->dateend],
            [],
            ['NO', 'TAMU', 'SUPIR', 'DEWASA', 'ANAK', 'BAYI', 'DESTINASI', 'RATE', 'TANGGAL']
        ];

        // Add the table data from $items
        foreach ($this->items as $index => $item) {
            $export_data[] = [
                $index + 1,
                $item->rsPengunjung->nama_lengkap_pengunjung,
                $item->rsSupir->nama_panggilan,
                $item->dewasa,
                $item->anak,
                $item->bayi,
                $item->destinasi,
                $item->taksir,
                $item->tanggal,
            ];
        }

        // Add salary details
        $export_data[] = [];
        $export_data[] = ['Gaji Total', $this->pemasukan];
        $export_data[] = ['Gaji Owner (10%)', $this->gaji_owner];
        $export_data[] = ['Gaji Admin', $this->gaji_admin];
        $export_data[] = ['Gaji Drivers', $this->gaji_drivers];

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