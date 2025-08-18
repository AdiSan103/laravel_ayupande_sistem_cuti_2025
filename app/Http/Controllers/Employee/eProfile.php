<?php
 
 namespace App\Http\Controllers\Employee;
 use App\Http\Controllers\Controller;
 
use App\Models\User;
use Illuminate\View\View;
 
class eProfile extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): View
    {
        $genders = collect([
            (object) [
                'id' => 1,
                'name' => 'LAKI-LAKI'
            ],
            (object) [
                'id' => 2,
                'name' => 'PEREMPUAN'
            ]
        ]);
        return view('employee.profile.index', compact('genders'));
    }
}