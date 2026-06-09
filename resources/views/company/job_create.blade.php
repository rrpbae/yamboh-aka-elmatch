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
                    <h3 style="font-weight: 700; color: var(--text-main); margin:0;">Publikasikan Lowongan Baru</h3>
                </div>

                <hr style="border-color: rgba(163, 174, 209, 0.3); margin-bottom: 30px;">

                <form method="POST" action="{{ route('company.jobs.store') }}">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="posisi" style="font-weight: 600; color: var(--text-main); margin-bottom: 8px;">Posisi / Jabatan Pekerjaan</label>
                        <input type="text" class="form-control form-control-premium @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{ old('posisi') }}" placeholder="Contoh: Backend Web Developer" required>
                        @error('posisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" style="font-weight: 600; color: var(--text-main); margin-bottom: 8px;">Deskripsi Singkat Pekerjaan</label>
                        <textarea class="form-control form-control-premium @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Ceritakan secara singkat apa yang akan dikerjakan pada posisi ini..." required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kualifikasi" style="font-weight: 600; color: var(--text-main); margin-bottom: 8px;">Kualifikasi & Persyaratan (Skill)</label>
                        <textarea class="form-control form-control-premium @error('kualifikasi') is-invalid @enderror" id="kualifikasi" name="kualifikasi" rows="5" placeholder="Sebutkan skill spesifik agar sistem AI kami mudah memprosesnya. Contoh: Menguasai PHP, Laravel, MySQL. Berpengalaman 2 tahun..." required>{{ old('kualifikasi') }}</textarea>
                        <small style="color: var(--text-muted); margin-top: 5px; display: block;">* Pastikan menuliskan kata kunci (keyword) skill teknis yang dibutuhkan agar sistem rekomendasi AI ElMatch berjalan optimal.</small>
                        @error('kualifikasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-5">
                        <button type="submit" class="premium-btn px-5">Publikasikan Lowongan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
