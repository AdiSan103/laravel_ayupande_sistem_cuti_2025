<?php
 
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\DataJabatan;
use App\Models\User;
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
        $email = $request->email;
        $password = $request->password;

        // Perusahaan Induk
        // if ($email === 'perusahaaninduk@gmail.com' && $password === 'perusahaaninduk') {
        $user = User::where('email', $email)->first();
        if($user) {
            // check password
            if($user->password == $password) {
                // Encrypt the value
                $encryptedValue = Crypt::encryptString('true');
                // Buat cookie yang berlaku selama 1 hari (1440 menit)
                Cookie::queue('angga_bali_trans_perusahaan_induk', $encryptedValue, 1440);

                Alert::success('Success', 'success');

                return redirect('/pi');
            }
        }


        // Vendor Check
        $vendor = DataJabatan::where('email', $email)->whereNotNull('vendor')->first();
        if ($vendor) {
            // check password
            if($vendor->password == $password) {

                // Encrypt the value
                $encryptedValue = Crypt::encryptString('true');
                // Buat cookie yang berlaku selama 1 hari (1440 menit)
                Cookie::queue('angga_bali_trans_owner', $encryptedValue, 1440);

                Alert::success('Success', 'success');

                return redirect('/v');

            }
        }

        // Admin Check
        $admin = DataJabatan::where('email', $email)->whereNotNull('admin')->first();
        if ($admin) {
            // check password
            if($admin->password == $password) {
                // Encrypt the value
                $encryptedValue = Crypt::encryptString('true');
                // Buat cookie yang berlaku selama 1 hari (1440 menit)
                Cookie::queue('angga_bali_trans_admin', $encryptedValue, 1440);

                Alert::success('Success', 'success');

                return redirect('/a');

            }
        }

        Alert::warning('Info', 'email or password does not match.');

        // Authentication Failed
        return redirect()->back()->with('error', 'Email atau password salah.');
    }
}
