<?php
 
 namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
 
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class aPegawai extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index()
    {
        $users =  UserModel::where('soft_delete', null)->get();
        return view('admin.pegawai.index', compact('users'));
    }
    public function detail($id) {
        $user = UserModel::where('id', $id)->first();
        return view('admin.pegawai.detail',compact('user'));
    }

    public function updated(Request $request, $id)
    {
        // Ambil user dari cookie
        $user = UserModel::firstWhere('id', $id);
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
            'masa_kerja'     => 'nullable|integer',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Update field non-file
        $user->nama    = $request->nama;
        // $user->nip    = $request->nip;
        // $user->email   = $request->email;
        $user->tempat_lahir    = $request->tempat_lahir;
        $user->tanggal_lahir    = $request->tanggal_lahir;
        $user->telp    = $request->telp;
        $user->masa_kerja    = $request->masa_kerja;
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

    public function createform()
    {
        return view('admin.pegawai.register');
    }
    
    public function created(Request $request)
    {
        $validated = $request->validate([
            'nama'           => 'required|string|max:255',
            'nip'            => 'required|string|unique:user,nip',
            'email'          => 'required|email|unique:user,email',
            'password'       => 'required|min:6|confirmed',
            'role'           => ['required', Rule::in(['admin', 'employee'])],
            'tempat_lahir'   => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date',
            'telp'           => 'nullable|string',
            'jabatan'        => 'nullable|string|max:255',
            'masa_kerja'     => 'nullable|integer',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload foto jika ada
        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            // Ambil ekstensi asli file
            $extension = $file->getClientOriginalExtension();

            // Generate nama acak
            $randomName = Str::random(20) . '.' . $extension;

            // Tentukan lokasi penyimpanan
            $destinationPath = public_path('uploads/users');

            // Pindahkan file ke folder public/uploads/users dengan nama random
            $file->move($destinationPath, $randomName);

            // Simpan path ke database
            $fotoPath = 'uploads/users/' . $randomName;
        }


        // Simpan user baru
        UserModel::create([
            'nama'          => $validated['nama'],
            'nip'           => $validated['nip'],
            'email'         => $validated['email'],
            'password'      => Hash::make($validated['password']),
            'role'          => $validated['role'],
            'tempat_lahir'  => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'telp'          => $validated['telp'],
            'jabatan'       => $validated['jabatan'],
            'masa_kerja'    => $validated['masa_kerja'],
            'foto'          => $fotoPath,
        ]);

        Alert::success('Berhasil', 'berhasil membuat akun');
        return redirect()->back()->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function deleted($id) {

        // Ambil user dari cookie
        $user = UserModel::firstWhere('id', $id);
        if (!$user) {
            return back()->withErrors(['auth' => 'User tidak ditemukan.'])->withInput();
        }

        $user->soft_delete = Carbon::now();
        $user->save();

        Alert::success('User Deleted', 'Berhasil Menghapus User');
        return redirect()->back();
    }

     public function restore($id) {

        // Ambil user dari cookie
        $user = UserModel::firstWhere('id', $id);
        if (!$user) {
            return back()->withErrors(['auth' => 'User tidak ditemukan.'])->withInput();
        }

        $user->soft_delete = null;
        $user->save();

        Alert::success('User Restore', 'Berhasil Mengembalikan User');
        return redirect()->back();
    }
}