<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobVacancy;

class JobVacancyController extends Controller
{
    public function create()
    {
        return view('company.job_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kualifikasi' => 'required|string',
            'kontak_email' => 'required_without:kontak_telepon|nullable|email|max:255',
            'kontak_telepon' => 'required_without:kontak_email|nullable|string|max:20',
        ], [
            'kontak_email.required_without' => 'Anda harus mengisi setidaknya salah satu kontak (Email atau No. Telepon).',
            'kontak_telepon.required_without' => 'Anda harus mengisi setidaknya salah satu kontak (Email atau No. Telepon).',
        ]);

        $company = auth()->user()->company;

        if (!$company) {
            return redirect()->route('company.profile.create')->with('error', 'Silakan lengkapi profil perusahaan terlebih dahulu.');
        }

        JobVacancy::create([
            'company_id' => $company->id,
            'posisi' => $request->posisi,
            'deskripsi' => $request->deskripsi,
            'kualifikasi' => $request->kualifikasi,
            'kontak_email' => $request->kontak_email,
            'kontak_telepon' => $request->kontak_telepon,
            'status_open' => true,
        ]);

        return redirect()->route('company.dashboard')->with('success', 'Lowongan kerja berhasil ditambahkan.');
    }

    public function edit(JobVacancy $job)
    {
        // Pastikan loker ini milik perusahaan yang sedang login
        if ($job->company_id !== auth()->user()->company->id) {
            abort(403);
        }

        return view('company.job_edit', compact('job'));
    }

    public function update(Request $request, JobVacancy $job)
    {
        if ($job->company_id !== auth()->user()->company->id) {
            abort(403);
        }

        $request->validate([
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kualifikasi' => 'required|string',
            'kontak_email' => 'required_without:kontak_telepon|nullable|email|max:255',
            'kontak_telepon' => 'required_without:kontak_email|nullable|string|max:20',
            'status_open' => 'boolean',
        ], [
            'kontak_email.required_without' => 'Anda harus mengisi setidaknya salah satu kontak (Email atau No. Telepon).',
            'kontak_telepon.required_without' => 'Anda harus mengisi setidaknya salah satu kontak (Email atau No. Telepon).',
        ]);

        $job->update([
            'posisi' => $request->posisi,
            'deskripsi' => $request->deskripsi,
            'kualifikasi' => $request->kualifikasi,
            'kontak_email' => $request->kontak_email,
            'kontak_telepon' => $request->kontak_telepon,
            'status_open' => $request->has('status_open'),
        ]);

        return redirect()->route('company.dashboard')->with('success', 'Lowongan kerja berhasil diperbarui.');
    }

    public function destroy(JobVacancy $job)
    {
        if ($job->company_id !== auth()->user()->company->id) {
            abort(403);
        }

        $job->delete();

        return redirect()->route('company.dashboard')->with('success', 'Lowongan kerja berhasil dihapus.');
    }

    public function show(JobVacancy $job)
    {
        // Only allow viewing open jobs or if the user is the company that owns it
        return view('user.job_show', compact('job'));
    }
}
