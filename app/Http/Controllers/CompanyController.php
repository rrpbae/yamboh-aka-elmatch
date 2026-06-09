<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function dashboard()
    {
        $company = auth()->user()->company;
        if (!$company) {
            return redirect()->route('company.profile.create');
        }

        $jobs = $company->jobVacancies()->latest()->get();
        return view('company.dashboard', compact('company', 'jobs'));
    }

    public function createProfile()
    {
        return view('company.profile_create');
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:255',
        ]);

        Company::create([
            'user_id' => auth()->id(),
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
        ]);

        return redirect()->route('company.dashboard')->with('success', 'Profil perusahaan berhasil disimpan.');
    }
}
