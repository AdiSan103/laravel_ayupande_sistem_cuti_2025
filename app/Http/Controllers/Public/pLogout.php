<?php
 
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;


class pLogout extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index()
    {
        // Hapus cookie dengan memberi nilai null dan waktu -1 menit
        Cookie::queue(Cookie::forget('angga_bali_trans_perusahaan_induk'));

        // Hapus cookie dengan memberi nilai null dan waktu -1 menit
        Cookie::queue(Cookie::forget('angga_bali_trans_owner'));

        // Hapus cookie dengan memberi nilai null dan waktu -1 menit
        Cookie::queue(Cookie::forget('angga_bali_trans_admin'));

        Alert::success('Logout', 'success');

        return redirect('/');
    }
}