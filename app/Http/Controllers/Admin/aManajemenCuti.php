<?php
 
 namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
use App\Models\CutiModel;
use App\Models\User;
use Illuminate\View\View;
 
class aManajemenCuti extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): View
    {
        $items = CutiModel::whereHas('pengguna', function ($q) {
            $q->whereNull('soft_delete');
        })->with('pengguna')->get();

        return view('admin.manajemen-cuti.index', compact('items'));
    }
}