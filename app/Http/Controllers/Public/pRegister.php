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
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class pRegister extends Controller
{
    /**
     * Show the login page.
     */
    public function index()
    {
        return view('register');
    }
    
    public function register(Request $request)
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
}
