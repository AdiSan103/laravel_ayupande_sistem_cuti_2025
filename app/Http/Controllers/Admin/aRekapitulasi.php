<?php
 
 namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
 
use App\Models\User;
use App\Models\UserModel;
use Illuminate\View\View;
 
class aRekapitulasi extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index()
    {
        $users =  UserModel::where('role', '!=', 'admin')->get();
        return view('admin.rekapitulasi.index', compact('users'));
    }
        public function detail($id)
    {
        $user = UserModel::where('id', $id)->first();
        return view('admin.rekapitulasi.detail', compact('user'));
    }
}