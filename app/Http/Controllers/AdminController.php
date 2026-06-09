<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\JobVacancy;
use App\Models\Cv;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => User::where('role', 'user')->count(),
            'total_companies' => Company::count(),
            'total_jobs' => JobVacancy::count(),
            'total_cvs' => Cv::count(),
        ];

        $recentUsers = User::latest()->take(5)->get();
        $recentCompanies = Company::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentCompanies'));
    }
}
