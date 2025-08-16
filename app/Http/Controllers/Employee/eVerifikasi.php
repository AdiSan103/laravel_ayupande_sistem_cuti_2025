<?php
 
 namespace App\Http\Controllers\Employee;
 use App\Http\Controllers\Controller;
 
use App\Models\User;
use Illuminate\View\View;
 
class eVerifikasi extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): View
    {
        return view('employee.verifikasi.index');
    }
}