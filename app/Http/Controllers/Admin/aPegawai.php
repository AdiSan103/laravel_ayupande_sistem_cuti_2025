<?php
 
 namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
 
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;


class aPegawai extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index()
    {
        $users =  UserModel::where('role', '!=', 'admin')->get();
        return view('admin.pegawai.index', compact('users'));
    }
    public function detail($id) {
        $user = UserModel::where('id', $id)->first();
        return view('admin.pegawai.detail',compact('user'));
    }

    public function updated(Request $request)
    {
        // Ambil user dari cookie
        $user = UserModel::firstWhere('email', $request->cookie('TOKEN_LOGIN'));
        if (!$user) {
            return back()->withErrors(['auth' => 'User tidak ditemukan.'])->withInput();
        }

        // Validasi
        $request->validate([
            'nama'           => 'required|string|max:255',
            // 'nip'            => 'required|string',
            // 'email'          => 'required|email',
            'tempat_lahir'   => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date',
            'telp'           => 'nullable|string',
            'password'       => 'nullable|min:6|confirmed',
            'jabatan'        => 'nullable|string|max:255',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Update field non-file
        $user->nama    = $request->nama;
        // $user->nip    = $request->nip;
        // $user->email   = $request->email;
        $user->tempat_lahir    = $request->tempat_lahir;
        $user->tanggal_lahir    = $request->tanggal_lahir;
        $user->telp    = $request->telp;
        $user->jabatan = $request->jabatan;

        if($request->password) {
            $user->password = Hash::make($request->password);
        }

        // ====== HANDLE FOTO (sesuai logika kamu) ======
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            // Pastikan folder tujuan ada
            $destinationPath = public_path('uploads/users');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Nama random + ekstensi asli
            $extension  = $file->getClientOriginalExtension();
            $randomName = Str::random(20) . '.' . $extension;

            // Hapus file lama jika ada & path valid
            if (!empty($user->foto)) {
                $oldPath = public_path($user->foto); // karena kita simpan 'uploads/users/xxx.ext'
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            // Pindahkan file ke public/uploads/users
            $file->move($destinationPath, $randomName);

            // Simpan path relatif di DB
            $user->foto = 'uploads/users/' . $randomName;
        }
        // ==============================================

        $user->save();
        Alert::success('success', 'Profil berhasil diperbarui.');
        return redirect()->back();
    }
}