<?php
 
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\DataJabatan;
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
    public function index()
    {
        return view('login');
    }
    
    public function login(Request $request)
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
        } elseif ($user->role === 'employee') {
            return redirect('/e');
        }

        Alert::info('Error tidak di kenali!', 'hubungi admin sistem!');
        return back();
    }
}
