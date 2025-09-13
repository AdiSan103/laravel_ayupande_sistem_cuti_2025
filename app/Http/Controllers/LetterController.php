<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LetterController extends Controller
{

    // preview: render HTML langsung di browser
    public function preview(Request $request, $id)
    {
        $data = [];
        return view('components.template_pdf', $data); // menampilkan HTML surat di browser
    }

    // download: generate PDF dari view dan download
    public function download(Request $request, $id)
    {
        $data = [];

        // load view dan buat pdf
        $pdf = Pdf::loadView('components.template_pdf', $data);

        // optional: set paper size & orientation
        $pdf->setPaper('f4', 'portrait');

        // download file
        return $pdf->download('export_surat_cuti.pdf');
    }

}
