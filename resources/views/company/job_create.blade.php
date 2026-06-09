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
                    <h3 style="font-weight: 600; color: var(--text-main); margin:0; font-size: 1.25rem;">Publikasikan Lowongan Baru</h3>
                </div>

                <form method="POST" action="{{ route('company.jobs.store') }}">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="posisi" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Posisi / Jabatan Pekerjaan</label>
                        <input type="text" class="form-control form-control-premium @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{ old('posisi') }}" placeholder="Contoh: Backend Web Developer" required>
                        @error('posisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Deskripsi Singkat Pekerjaan</label>
                        <textarea class="form-control form-control-premium @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" placeholder="Ceritakan secara singkat apa yang akan dikerjakan pada posisi ini..." required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="kualifikasi" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Kualifikasi & Persyaratan (Keahlian)</label>
                        <textarea class="form-control form-control-premium @error('kualifikasi') is-invalid @enderror" id="kualifikasi" name="kualifikasi" rows="5" placeholder="Contoh: Menguasai PHP, Laravel, MySQL. Berpengalaman 2 tahun..." required>{{ old('kualifikasi') }}</textarea>
                        <small style="color: var(--text-muted); margin-top: 8px; display: block; font-size: 0.85rem;">* Pastikan menuliskan kata kunci (keyword) keahlian spesifik agar sistem AI kami dapat mencocokkannya dengan CV pelamar.</small>
                        @error('kualifikasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="premium-btn px-4 py-2">Publikasikan Lowongan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
