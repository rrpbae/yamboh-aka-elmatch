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

    public function users()
    {
        // Ambil semua user kecuali admin, atau filter role user saja
        $users = User::where('role', 'user')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function destroyUser(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Tidak dapat menghapus admin.');
        }
        
        $user->delete();
        return back()->with('success', 'Pengguna berhasil dihapus.');
    }

    public function companies()
    {
        $companies = Company::with('user')->latest()->paginate(10);
        return view('admin.companies.index', compact('companies'));
    }

    public function destroyCompany(Company $company)
    {
        $company->delete();
        return back()->with('success', 'Perusahaan berhasil dihapus.');
    }

    public function jobs()
    {
        $jobs = JobVacancy::with('company')->latest()->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function destroyJob(JobVacancy $job)
    {
        $job->delete();
        return back()->with('success', 'Lowongan berhasil dihapus.');
    }

    public function cvs()
    {
        $cvs = Cv::with('user')->latest()->paginate(10);
        return view('admin.cvs.index', compact('cvs'));
    }

    public function destroyCv(Cv $cv)
    {
        $cv->delete();
        return back()->with('success', 'Data CV berhasil dihapus.');
    }

    public function downloadReport()
    {
        $fileName = 'laporan_elmatch_' . date('Y-m-d_H-i-s') . '.csv';

        $usersCount = User::where('role', 'user')->count();
        $companiesCount = Company::count();
        $jobsCount = JobVacancy::count();
        $cvsCount = Cv::count();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Kategori Data', 'Total');

        $callback = function() use($usersCount, $companiesCount, $jobsCount, $cvsCount, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            
            fputcsv($file, array('Total Pencari Kerja', $usersCount));
            fputcsv($file, array('Total Perusahaan Mitra', $companiesCount));
            fputcsv($file, array('Total Lowongan Kerja', $jobsCount));
            fputcsv($file, array('Total CV Dianalisis', $cvsCount));
            
            fputcsv($file, array('', ''));
            fputcsv($file, array('Laporan digenerate pada', date('Y-m-d H:i:s')));

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
