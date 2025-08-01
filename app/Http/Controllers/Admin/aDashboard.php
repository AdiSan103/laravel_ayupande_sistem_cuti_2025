<?php
 
 namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
 
use App\Models\User;
use Illuminate\View\View;
 
class aDashboard extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): View
    {
        return view('admin.index');
    }
}