<?php
 
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\DataJabatan;
use App\Models\JatahCutiModel;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;


class pLogin extends Controller
{
    /**
     * Show the login page.
     */
    public function index_employee()
    {
        return view('employee.login');
    }
    
    public function login_employee(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cari user berdasarkan email
        $user = UserModel::where('email', $request->email)->first();

        if (!$user) {
            Alert::info('Akun tidak di temukan', 'hubungi admin sistem!');
            return back();
        }

        // Cek Jatah CUTI TAHUNAN 📅
        // Tahun sekarang
        $tahunSekarang = now()->year;

        // Cek apakah sudah ada jatah cuti di tahun ini untuk user
        $jatahCutiTahunan = JatahCutiModel::where('id_user', $user->id)
            ->where('tahun', $tahunSekarang)
            // ->where('created_at', '<', $user->created_at)
            ->first(); // pakai first(), bukan get()

        if (!$jatahCutiTahunan) {
            // Jika belum ada, buatkan
            JatahCutiModel::create([
                'id_user'    => $user->id,
                'tahun'      => $tahunSekarang,
                'jatah_cuti' => 12
            ]);
        }




        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            Alert::info('Akun dan Password Salah!', 'hubungi admin sistem!');
            return back();
        }

        // Simpan email ke cookie selama 1 minggu
        Cookie::queue('TOKEN_LOGIN', $user->email, 60 * 24 * 7); // 7 hari

        // Simpan session login
        // session(['user_id' => $user->id, 'role' => $user->role]);

        Alert::success('Berhasil!', 'selamat datang di aplikasi!');
        // Cek role dan redirect
        return redirect('/e');

        Alert::info('Error tidak di kenali!', 'hubungi admin sistem!');
        return back();
    }

        public function index_admin()
    {
        return view('admin.login');
    }
    
    public function login_admin(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cari user berdasarkan email
        $user = UserModel::where('email', $request->email)->first();

        if (!$user) {
            Alert::info('Akun tidak di temukan', 'hubungi admin sistem!');
            return back();
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            Alert::info('Akun dan Password Salah!', 'hubungi admin sistem!');
            return back();
        }

        // Simpan email ke cookie selama 1 minggu
        Cookie::queue('TOKEN_LOGIN', $user->email, 60 * 24 * 7); // 7 hari

        // Simpan session login
        // session(['user_id' => $user->id, 'role' => $user->role]);

        Alert::success('Berhasil!', 'selamat datang di aplikasi!');
        // Cek role dan redirect
        if ($user->role === 'admin') {
            return redirect('/a');
        }

        Alert::info('Error tidak di kenali!', 'hubungi admin sistem!');
        return back();
    }
}
