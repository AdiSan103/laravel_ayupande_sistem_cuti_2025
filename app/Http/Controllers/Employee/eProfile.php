<?php
 
 namespace App\Http\Controllers\Employee;
 use App\Http\Controllers\Controller;
 
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class eProfile extends Controller
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
        return view('employee.profile.index', compact('roles', 'user'));
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
            // 'nip'            => 'required|string|unique:user,nip',
            // 'email'          => 'required|email|unique:user,email',
            'tempat_lahir'   => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date',
            'telp'           => 'nullable|string',
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