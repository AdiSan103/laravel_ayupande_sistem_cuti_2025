<?php
 
 namespace App\Http\Controllers\Employee;
 use App\Http\Controllers\Controller;
use App\Models\CutiModel;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
 
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
}