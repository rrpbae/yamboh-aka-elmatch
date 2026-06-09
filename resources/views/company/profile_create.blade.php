@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="premium-card">
                <div class="text-center mb-4">
                    <div style="background: rgba(67, 24, 255, 0.1); width: 80px; height: 80px; border-radius: 50%; display:flex; align-items:center; justify-content:center; margin: 0 auto 20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="var(--accent-color)" class="bi bi-building" viewBox="0 0 16 16">
                          <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                          <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/>
                        </svg>
                    </div>
                    <h3 style="font-weight: 700; color: var(--text-main);">Lengkapi Profil Perusahaan</h3>
                    <p style="color: var(--text-muted);">Silakan lengkapi data di bawah ini sebelum Anda dapat mempublikasikan lowongan kerja.</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger" style="border-radius: 12px; background: rgba(238, 93, 80, 0.1); color: #ee5d50; border: none; border-left: 5px solid #ee5d50;">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('company.profile.store') }}">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="nama_perusahaan" style="font-weight: 600; color: var(--text-main); margin-bottom: 8px;">Nama Perusahaan</label>
                        <input type="text" class="form-control form-control-premium @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" placeholder="Contoh: PT Teknologi Nusantara" required>
                        @error('nama_perusahaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kontak" style="font-weight: 600; color: var(--text-main); margin-bottom: 8px;">Email / Nomor Kontak</label>
                        <input type="text" class="form-control form-control-premium @error('kontak') is-invalid @enderror" id="kontak" name="kontak" value="{{ old('kontak') }}" placeholder="Contoh: hrd@teknologi.com / 0812345678" required>
                        @error('kontak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="alamat" style="font-weight: 600; color: var(--text-main); margin-bottom: 8px;">Alamat Lengkap Kantor</label>
                        <textarea class="form-control form-control-premium @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="4" placeholder="Contoh: Gedung Cyber 2, Lt. 12, Jl. HR Rasuna Said..." required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="premium-btn">Simpan Profil Perusahaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
