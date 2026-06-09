@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="premium-card">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('company.dashboard') }}" class="btn btn-light rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                    </a>
                    <h3 style="font-weight: 700; color: var(--text-main); margin:0;">Edit Lowongan: {{ $job->posisi }}</h3>
                </div>

                <hr style="border-color: rgba(163, 174, 209, 0.3); margin-bottom: 30px;">

                <form method="POST" action="{{ route('company.jobs.update', $job->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="posisi" style="font-weight: 600; color: var(--text-main); margin-bottom: 8px;">Posisi / Jabatan Pekerjaan</label>
                        <input type="text" class="form-control form-control-premium @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{ old('posisi', $job->posisi) }}" required>
                        @error('posisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" style="font-weight: 600; color: var(--text-main); margin-bottom: 8px;">Deskripsi Singkat Pekerjaan</label>
                        <textarea class="form-control form-control-premium @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $job->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kualifikasi" style="font-weight: 600; color: var(--text-main); margin-bottom: 8px;">Kualifikasi & Persyaratan (Skill)</label>
                        <textarea class="form-control form-control-premium @error('kualifikasi') is-invalid @enderror" id="kualifikasi" name="kualifikasi" rows="5" required>{{ old('kualifikasi', $job->kualifikasi) }}</textarea>
                        @error('kualifikasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 premium-card p-3" style="background: rgba(163, 174, 209, 0.1); border-color: transparent;">
                        <div class="form-check form-switch" style="font-size: 1.1rem;">
                            <input class="form-check-input" type="checkbox" role="switch" id="status_open" name="status_open" value="1" {{ old('status_open', $job->status_open) ? 'checked' : '' }} style="cursor:pointer;">
                            <label class="form-check-label ms-2" for="status_open" style="font-weight: 600; color: var(--text-main); cursor:pointer;">Status Lowongan Terbuka</label>
                        </div>
                        <small style="color: var(--text-muted); display: block; margin-top: 5px;">Jika dinonaktifkan (di-off-kan), lowongan ini tidak akan muncul lagi di sistem rekomendasi pelamar.</small>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="premium-btn px-5">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
