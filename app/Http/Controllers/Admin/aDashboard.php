<?php
 
 namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
use App\Models\CutiModel;
use App\Models\User;
use Illuminate\View\View;
 
class aDashboard extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): View
    {
        $profileVisit = [9, 20, 30, 20, 10, 20, 30, 20, 10, 20, 30, 20];
        $europeSeries = [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605];
        $americaSeries = [400, 700, 500, 600, 520, 450, 600, 750, 500, 520, 400, 580];
        $indonesiaSeries = [250, 500, 450, 300, 420, 350, 500, 600, 400, 450, 300, 500];

        $cTahunan = CutiModel::where('id_jenis_cuti', 1)->get()->count();
        $cSakit = CutiModel::where('id_jenis_cuti', 2)->get()->count();
        $cMelahirkan = CutiModel::where('id_jenis_cuti', 3)->get()->count();
        $cAlasanPenting = CutiModel::where('id_jenis_cuti', 4)->get()->count();

        $visitorsProfile = [
            $cTahunan,
            $cSakit,
            $cMelahirkan,
            $cAlasanPenting
        ]; // Male, Female


        $totalCuti = CutiModel::get()->count();
        $totalPending = CutiModel::where('status', 'pending')->get()->count();
        $totalDisetujui = CutiModel::where('status', 'disetujui')->get()->count();
        $totalDitolak = CutiModel::where('status', 'ditolak')->get()->count();
        

        return view('admin.index', compact(
            'profileVisit',
            'visitorsProfile',
            'europeSeries',
            'americaSeries',
            'indonesiaSeries',
            'totalCuti',
            'totalPending',
            'totalDisetujui',
            'totalDitolak'
        ));
    }
}