<?php
 
 namespace App\Http\Controllers\Employee;
 use App\Http\Controllers\Controller;
use App\Models\CutiModel;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
 
class eStatus extends Controller
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


        $items = CutiModel::where('id_user', $user->id)->get();
        return view('employee.status.index', compact('items'));
    }
}