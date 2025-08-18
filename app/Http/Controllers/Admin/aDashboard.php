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
        $profileVisit = [9, 20, 30, 20, 10, 20, 30, 20, 10, 20, 30, 20];
        $visitorsProfile = [70, 15,15]; // Male, Female
        $europeSeries = [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605];
        $americaSeries = [400, 700, 500, 600, 520, 450, 600, 750, 500, 520, 400, 580];
        $indonesiaSeries = [250, 500, 450, 300, 420, 350, 500, 600, 400, 450, 300, 500];


        return view('admin.index', compact(
            'profileVisit',
            'visitorsProfile',
            'europeSeries',
            'americaSeries',
            'indonesiaSeries'
        ));
    }
}