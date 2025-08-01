<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PayrollExport implements FromArray, WithHeadings, WithTitle
{
    protected $data;
    protected $items;
    protected $gaji_owner;
    protected $gaji_admin;
    protected $pemasukan;

    public function __construct($data, $items, $gaji_owner, $gaji_admin, $pemasukan)
    {
        $this->data = $data;
        $this->items = $items;
        $this->gaji_owner = $gaji_owner;
        $this->gaji_admin = $gaji_admin;
        $this->pemasukan = $pemasukan;
    }

    public function array(): array
    {
        $export_data = [
            ['PENGGAJIAN OWNER'],
            ['Nama Owner', $this->data->rsOwner->nama_panggilan],
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
                $item->rsOwner->nama_panggilan,
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
        $export_data[] = ['Gaji Owner', $this->gaji_owner];
        $export_data[] = ['Gaji Admin', $this->gaji_admin];

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