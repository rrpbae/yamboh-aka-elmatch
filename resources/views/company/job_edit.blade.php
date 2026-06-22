@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="premium-card">
                <div class="d-flex align-items-center mb-4 pb-3" style="border-bottom: 1px solid var(--card-border);">
                    <a href="{{ route('company.dashboard') }}" class="btn btn-light" style="border: 1px solid var(--card-border); background: white; border-radius: 8px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; margin-right: 16px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                    </a>
                    <h3 style="font-weight: 600; color: var(--text-main); margin:0; font-size: 1.25rem;">Edit Lowongan: {{ $job->posisi }}</h3>
                </div>

                <form method="POST" action="{{ route('company.jobs.update', $job->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="posisi" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Posisi / Jabatan Pekerjaan</label>
                        <input type="text" class="form-control form-control-premium @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{ old('posisi', $job->posisi) }}" required>
                        @error('posisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Deskripsi Singkat Pekerjaan</label>
                        <textarea class="form-control form-control-premium @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $job->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kualifikasi" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Kualifikasi & Persyaratan (Keahlian)</label>
                        <textarea class="form-control form-control-premium @error('kualifikasi') is-invalid @enderror" id="kualifikasi" name="kualifikasi" rows="5" required>{{ old('kualifikasi', $job->kualifikasi) }}</textarea>
                        @error('kualifikasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label style="font-weight: 700; color: var(--text-main); font-size: 1rem; margin-bottom: 4px; display: block;">Informasi Kontak <span class="text-danger">*</span></label>
                        <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 12px;">Wajib mengisi setidaknya salah satu kontak agar pelamar dapat menghubungi Anda.</p>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="kontak_email" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Email Kontak</label>
                                <input type="email" class="form-control form-control-premium @error('kontak_email') is-invalid @enderror" id="kontak_email" name="kontak_email" value="{{ old('kontak_email', $job->kontak_email) }}" placeholder="Contoh: hrd@perusahaan.com">
                                @error('kontak_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="kontak_telepon" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">No. Telepon/WhatsApp</label>
                                <input type="text" class="form-control form-control-premium @error('kontak_telepon') is-invalid @enderror" id="kontak_telepon" name="kontak_telepon" value="{{ old('kontak_telepon', $job->kontak_telepon) }}" placeholder="Contoh: 08123456789">
                                @error('kontak_telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-5 premium-card p-4" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <div class="form-check form-switch" style="font-size: 1.1rem; display: flex; align-items: center;">
                            <input class="form-check-input mt-0" type="checkbox" role="switch" id="status_open" name="status_open" value="1" {{ old('status_open', $job->status_open) ? 'checked' : '' }} style="cursor:pointer; width: 2.5em; height: 1.25em;">
                            <label class="form-check-label ms-3" for="status_open" style="font-weight: 600; color: var(--text-main); cursor:pointer;">Status Lowongan Terbuka</label>
                        </div>
                        <small style="color: var(--text-muted); display: block; margin-top: 8px; font-size: 0.85rem; padding-left: 3.5rem;">Jika dinonaktifkan, lowongan ini tidak akan direkomendasikan lagi oleh AI kepada para pencari kerja.</small>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="premium-btn px-4 py-2">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
