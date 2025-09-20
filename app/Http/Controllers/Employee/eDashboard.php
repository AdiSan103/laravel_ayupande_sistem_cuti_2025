<?php
 
 namespace App\Http\Controllers\Employee;
 use App\Http\Controllers\Controller;
use App\Models\CutiModel;
use App\Models\JatahCutiModel;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
 
class eDashboard extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(Request $request): View
    {
        $email = $request->cookie('TOKEN_LOGIN');
        $user = UserModel::where('email', $email)->first();

        $profileVisit = [9, 20, 30, 20, 10, 20, 30, 20, 10, 20, 30, 20];
        $europeSeries = [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605];
        $americaSeries = [400, 700, 500, 600, 520, 450, 600, 750, 500, 520, 400, 580];
        $indonesiaSeries = [250, 500, 450, 300, 420, 350, 500, 600, 400, 450, 300, 500];

        $cTahunan = CutiModel::where('id_user', $user->id)->where('id_jenis_cuti', 1)->get()->count();
        $cSakit = CutiModel::where('id_user', $user->id)->where('id_jenis_cuti', 2)->get()->count();
        $cMelahirkan = CutiModel::where('id_user', $user->id)->where('id_jenis_cuti', 3)->get()->count();
        $cAlasanPenting = CutiModel::where('id_user', $user->id)->where('id_jenis_cuti', 4)->get()->count();

        $visitorsProfile = [
            $cTahunan,
            $cSakit,
            $cMelahirkan,
            $cAlasanPenting
        ]; // Male, Female


        $totalCuti = CutiModel::where('id_user', $user->id)->get()->count();

        $tahunSekarang = now()->year;

        // Ambil jatah cuti tahun ini (kalau ada, ambil nilainya, kalau tidak default 0)
        $totalJatahCuti = JatahCutiModel::where('id_user', $user->id)
            ->where('tahun', $tahunSekarang)
            ->value('jatah_cuti') ?? 0;

        // Hitung jumlah record tahun lain
        $jumlahTahunLain = JatahCutiModel::where('id_user', $user->id)
            ->where('tahun', '!=', $tahunSekarang)
            ->count();

        // Tambahkan hasilnya × 6
        $totalJatahCuti += ($jumlahTahunLain * 6);


        $totalSisaCuti = JatahCutiModel::where('id_user', $user->id)->sum('jatah_cuti') - $totalCuti;
        $totalPending = CutiModel::where('id_user', $user->id)->where('status', 'pending')->get()->count();
        

        return view('employee.index', compact(
            'profileVisit',
            'visitorsProfile',
            'europeSeries',
            'americaSeries',
            'indonesiaSeries',
            'totalCuti',
            'totalPending',
            'totalJatahCuti',
            'totalSisaCuti'
        ));
    }
}