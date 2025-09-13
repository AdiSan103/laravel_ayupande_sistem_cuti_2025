<?php
 
 namespace App\Http\Controllers\Employee;
 use App\Http\Controllers\Controller;
use App\Models\CutiModel;
use App\Models\JenisCutiModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ePermohonanCuti extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): View
    {
        $jenis_cuti =  JenisCutiModel::get();
        $verifikator = UserModel::get();
        return view('employee.permohonan-cuti.index', compact('jenis_cuti', 'verifikator'));
    }

    public function save(Request $request) {
        // 1) Ambil user dari cookie
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

        // 2) Validasi request
        $rules = [
            'jenis_cuti' => ['required', 'integer', 'exists:jenis_cuti,id'],
            'alasan'     => ['required', 'string'],
            'tgl_awal'   => ['required', 'date'],
            'tgl_akhir'  => ['required', 'date', 'after_or_equal:tgl_awal'],
            'alamat'     => ['nullable', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // 3) Hitung lama_hari
        $start = Carbon::parse($request->tgl_awal);
        $end   = Carbon::parse($request->tgl_akhir);
        $lamaHari = $start->diffInDays($end) + 1;

        // 4) Simpan via Eloquent
        CutiModel::create([
            'id_user'            => $user->id,
            'id_jenis_cuti'      => $request->jenis_cuti,
            'alasan'             => $request->alasan,
            'tgl_awal'           => $start->toDateString(),
            'tgl_akhir'          => $end->toDateString(),
            'lama_hari'          => $lamaHari,
            'alamat'             => $request->alamat,
            'verifikasi_user_1'  => $request->has('verifikasi_user_1'), // true kalau ada
            'verifikasi_user_2'  => $request->has('verifikasi_user_2'),
            'verifikasi_bupati'  => $request->has('verifikasi_bupati'),
            'status'             => 'pending',
        ]);

        Alert::success('Success!', 'data berhasil');
        return redirect()->back()->with('success', 'Pengajuan cuti berhasil disimpan.');
    }
}