<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PayrollExport4 implements FromArray, WithHeadings, WithTitle
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
            ['LAPORAN DATA SUPIR'],
            ['Tanggal Laporan', now()->format('Y-m-d')],
            [],
            ['NO', 'NAMA PANGGILAN', 'NAMA KTP', 'KONTAK', 'TIPE MOBIL', 'TAHUN', 'PLAT MOBIL', 'PENGALAMAN', 'SEJAK TAHUN', 'SPOKEN ENGLISH', 'KONDISI KENDARAAN', 'GROUND KNOWLEDGE']
        ];

        // Add the table data from $items
        foreach ($this->items as $index => $item) {
            $export_data[] = [
                $index + 1,
                $item->nama_panggilan,
                $item->nama_ktp,
                $item->kontak,
                $item->tipe_mobil,
                $item->tahun,
                $item->plat_mobil,
                $item->pengalaman,
                $item->sejak_tahun,
                $item->spoken_english,
                $item->vechicle_condition,
                $item->ground_knowledge,
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
        return 'Data Supir';
    }
}
