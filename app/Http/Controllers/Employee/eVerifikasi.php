<?php
 
 namespace App\Http\Controllers\Employee;
 use App\Http\Controllers\Controller;
use App\Models\CutiModel;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class eVerifikasi extends Controller
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


        $items = CutiModel::where('id_user', $user->id)->where('status', 'pending')->get();
        return view('employee.verifikasi.index', compact('items'));
    }

    public function detail($id): View
    {
        $items = CutiModel::where('id', $id)->first();
        return view('employee.verifikasi.detail', compact('items'));
    }

    public function save(Request $request, $id) {

        $cuti_data = CutiModel::where('id', $id)->first();

        // ====== HANDLE FILE_PENDUKUNG ======
        if ($request->hasFile('file_pendukung')) {
            $file = $request->file('file_pendukung');

            // Pastikan folder tujuan ada
            $destinationPath = public_path('uploads/file_pendukung');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Nama random + ekstensi asli
            $extension  = $file->getClientOriginalExtension();
            $randomName = Str::random(20) . '.' . $extension;

            // Hapus file lama jika ada & path valid
            if (!empty($cuti_data->file_pendukung)) {
                $oldPath = public_path($cuti_data->file_pendukung); // karena kita simpan 'uploads/users/xxx.ext'
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            // Pindahkan file ke public/uploads/users
            $file->move($destinationPath, $randomName);

            // Simpan path relatif di DB
            $cuti_data->file_pendukung = 'uploads/file_pendukung/' . $randomName;
        }
        // ==============================================


        // ====== HANDLE FILE_SUDAH_TTD ======
        if ($request->hasFile('file_sudah_ttd')) {
            $file = $request->file('file_sudah_ttd');

            // Pastikan folder tujuan ada
            $destinationPath = public_path('uploads/file_sudah_ttd');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Nama random + ekstensi asli
            $extension  = $file->getClientOriginalExtension();
            $randomName = Str::random(20) . '.' . $extension;

            // Hapus file lama jika ada & path valid
            if (!empty($cuti_data->file_sudah_ttd)) {
                $oldPath = public_path($cuti_data->file_sudah_ttd); // karena kita simpan 'uploads/users/xxx.ext'
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            // Pindahkan file ke public/uploads/users
            $file->move($destinationPath, $randomName);

            // Simpan path relatif di DB
            $cuti_data->file_sudah_ttd = 'uploads/file_sudah_ttd/' . $randomName;
        }

        //  =============================================

        $cuti_data->save();

        Alert::success('Berhasil', 'berhasil menyimpan data');
        return redirect()->back();
    }
}