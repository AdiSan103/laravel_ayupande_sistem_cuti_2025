<?php

namespace App\Http\Controllers;

use App\Models\CutiModel;
use App\Models\JatahCutiModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LetterController extends Controller
{

    // preview: render HTML langsung di browser
    public function preview(Request $request, $id)
    {
        $data = CutiModel::where('id', $id)->first();
        // =================================
        $today = Carbon::now();
        $createdAt = Carbon::parse($data->created_at)->addDays($data->masa_kerja);

        $diff = $createdAt->diff($today);

        $tahun = $diff->y;
        $bulan = $diff->m;
        $hari  = $diff->d;

        $lama_kerja = "{$tahun} tahun {$bulan} bulan {$hari} hari";
        // ==================================
        $cTahunan = CutiModel::where('id_user', $data->pengguna->id)->where('id_jenis_cuti', 1)->get()->count();
        $cSakit = CutiModel::where('id_user', $data->pengguna->id)->where('id_jenis_cuti', 2)->get()->count();
        $cMelahirkan = CutiModel::where('id_user', $data->pengguna->id)->where('id_jenis_cuti', 3)->get()->count();
        $cAlasanPenting = CutiModel::where('id_user', $data->pengguna->id)->where('id_jenis_cuti', 4)->get()->count();
        // ===================================
        $totalCuti = CutiModel::where('id_user', $data->pengguna->id)->get()->count();
        $totalSisaCuti = JatahCutiModel::where('id_user', $data->pengguna->id)->sum('jatah_cuti') - $totalCuti;
        return view('components.template_pdf', compact('data', 'lama_kerja','cTahunan','cSakit','cMelahirkan','cAlasanPenting','totalSisaCuti')); // menampilkan HTML surat di browser
    }

    // download: generate PDF dari view dan download
    public function download(Request $request, $id)
    {
        $data = CutiModel::where('id', $id)->first();
        // =================================
        $today = Carbon::now();
        $createdAt = Carbon::parse($data->created_at)->addDays($data->masa_kerja);

        $diff = $createdAt->diff($today);

        $tahun = $diff->y;
        $bulan = $diff->m;
        $hari  = $diff->d;

        $lama_kerja = "{$tahun} tahun {$bulan} bulan {$hari} hari";
        // =================================
        $cTahunan = CutiModel::where('id_user', $data->pengguna->id)->where('id_jenis_cuti', 1)->get()->count();
        $cSakit = CutiModel::where('id_user', $data->pengguna->id)->where('id_jenis_cuti', 2)->get()->count();
        $cMelahirkan = CutiModel::where('id_user', $data->pengguna->id)->where('id_jenis_cuti', 3)->get()->count();
        $cAlasanPenting = CutiModel::where('id_user', $data->pengguna->id)->where('id_jenis_cuti', 4)->get()->count();
        // ==================================
        $totalCuti = CutiModel::where('id_user', $data->pengguna->id)->get()->count();
        $totalSisaCuti = JatahCutiModel::where('id_user', $data->pengguna->id)->sum('jatah_cuti') - $totalCuti;
        // load view dan buat pdf
        $pdf = Pdf::loadView('components.template_pdf', compact('data','lama_kerja','cTahunan','cSakit','cMelahirkan','cAlasanPenting','totalSisaCuti'))
                ->setOption(['isRemoteEnabled' => true]);

        // optional: set paper size & orientation
        $pdf->setPaper('f4', 'portrait');

        // download file
        return $pdf->download('export_surat_cuti.pdf');
    }

}
