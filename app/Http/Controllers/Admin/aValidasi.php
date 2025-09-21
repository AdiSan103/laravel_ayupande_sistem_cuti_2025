<?php
 
 namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
use App\Models\CutiModel;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class aValidasi extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): View
    {
        $items = CutiModel::where('status', 'pending')->get();
        return view('admin.validasi.index', compact('items'));
    }

        public function detail($id): View
    {
        $list_status = collect([
            (object) [
                'id' => 'pending',
                'name' => 'pending'
            ],
            (object) [
                'id' => 'ditolak',
                'name' => 'ditolak'
            ],
            (object) [
                'id' => 'disetujui',
                'name' => 'disetujui'
            ]
        ]);
        $items = CutiModel::where('id', $id)->first();
        return view('admin.validasi.detail', compact('items', 'list_status'));
    }

    public function updated(Request $request,$id) {
 // Ambil user dari cookie
        $cuti_data = CutiModel::firstWhere('id', $id);
        
        // Validasi
        $request->validate([
            'status'           => 'required',
            // 'nip'            => 'required|string|unique:user,nip',
        ]);

        // Update field non-file
        $cuti_data->status    = $request->status;
        $cuti_data->catatan_admin    = $request->catatan_admin;
        // $user->    = $request->;

        $cuti_data->save();
        Alert::success('success', 'Profil berhasil diperbarui.');
        return redirect()->back(); 
    }
}