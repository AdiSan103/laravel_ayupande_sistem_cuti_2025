<?php
 
 namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
 
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class aProfile extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(Request $request)
    {
        // ############ FUNCTION GET DATA USER #########
        $email = $request->cookie('TOKEN_LOGIN');
        if (!$email) {
            return back()->withErrors(['auth' => 'TOKEN_LOGIN tidak ditemukan.'])->withInput();
        }

        $user = UserModel::where('email', $email)->first();
        if (!$user) {
            return back()->withErrors(['auth' => 'User tidak ditemukan.'])->withInput();
        }
        // ############ END #################

        $roles = collect([
            (object) [
                'id' => 'admin',
                'name' => 'Admin'
            ],
            (object) [
                'id' => 'employee',
                'name' => 'Employee'
            ]
        ]);
        
        return view('admin.profile.index', compact('user','roles'));
    }

    public function save(Request $request)
    {
        // Ambil user dari cookie
        $user = UserModel::firstWhere('email', $request->cookie('TOKEN_LOGIN'));
        if (!$user) {
            return back()->withErrors(['auth' => 'User tidak ditemukan.'])->withInput();
        }

        // Validasi
        $request->validate([
            'nama'           => 'required|string|max:255',
            'email'          => 'required|email',
            'password'       => 'nullable|min:6|confirmed',
            'telp'           => 'nullable|string',
            'jabatan'        => 'nullable|string|max:255',
        ]);

        // Update field non-file
        $user->nama    = $request->nama;
        $user->email    = $request->email;
        $user->telp    = $request->telp;
        $user->jabatan = $request->jabatan;

        if($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        Alert::success('success', 'Profil berhasil diperbarui.');
        return redirect()->back();
    }
}