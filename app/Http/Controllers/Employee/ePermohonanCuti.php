<?php
 
 namespace App\Http\Controllers\Employee;
 use App\Http\Controllers\Controller;
 
use App\Models\User;
use Illuminate\View\View;
 
class ePermohonanCuti extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): View
    {
        $dummy_data = collect([
            (object) [
                'id' => 1,
                'name' => 'Project A',
            ],
            (object) [
                'id' => 2,
                'name' => 'Project B',
            ],
        ]);
        return view('employee.permohonan-cuti.index', compact('dummy_data'));
    }
}