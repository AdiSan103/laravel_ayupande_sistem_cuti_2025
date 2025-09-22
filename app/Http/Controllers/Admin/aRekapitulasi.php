<?php
 
 namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
use App\Models\CutiModel;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\View\View;
 
class aRekapitulasi extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index()
    {
        $users =  UserModel::where('soft_delete', null)->get();
        return view('admin.rekapitulasi.index', compact('users'));
    }
        public function detail($id)
    {
        $user = UserModel::where('id', $id)->first();
        $cTahunan = CutiModel::where('id_user', $user->id)->where('id_jenis_cuti', 1)->get()->count();
        $cSakit = CutiModel::where('id_user', $user->id)->where('id_jenis_cuti', 2)->get()->count();
        $cMelahirkan = CutiModel::where('id_user', $user->id)->where('id_jenis_cuti', 3)->get()->count();
        $cAlasanPenting = CutiModel::where('id_user', $user->id)->where('id_jenis_cuti', 4)->get()->count();

        return view('admin.rekapitulasi.detail', compact('user', 'cTahunan', 'cSakit', 'cMelahirkan', 'cAlasanPenting'));
    }
}