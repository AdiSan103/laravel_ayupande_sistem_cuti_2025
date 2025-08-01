<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PayrollExport3 implements FromArray, WithHeadings, WithTitle
{
    protected $data;
    protected $items;
    protected $additionalInfo;

    public function __construct($data, $items, $additionalInfo)
    {
        $this->data = $data;
        $this->items = $items;
        $this->additionalInfo = $additionalInfo;
    }

    public function array(): array
    {
        $export_data = [
            ['LAPORAN DATA PENGUNJUNG'],
            ['Tanggal Laporan', now()->format('Y-m-d')],
            [],
            ['NO', 'TANGGAL', 'ID PENGUNJUNG', 'NAMA LENGKAP', 'DEWASA', 'ANAK', 'BAYI', 'DESTINASI', 'TAKSIR', 'DAFTAR PENGUNJUNG']
        ];

        // Add the table data from $items
        foreach ($this->items as $index => $item) {
            $export_data[] = [
                $index + 1,
                $item->tanggal,
                $item->id_pengunjung,
                $item->nama_lengkap_pengunjung,
                $item->dewasa,
                $item->anak,
                $item->bayi,
                $item->destinasi,
                number_format($item->taksir, 3, '.', '.') ,
                $item->daftar_pengunjung,
            ];
        }

        // Add additional information if necessary
        $export_data[] = [];
        if (isset($this->additionalInfo['summary'])) {
            $export_data[] = ['Ringkasan', $this->additionalInfo['summary']];
        }

        return $export_data;
    }

    public function headings(): array
    {
        return [];
    }

    public function title(): string
    {
        return 'Data Pengunjung';
    }
}
