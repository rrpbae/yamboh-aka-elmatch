@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="premium-card border-0" style="padding: 40px;">
                <div class="text-center mb-4">
                    <div style="background: var(--accent-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--accent-color)" class="bi bi-person-plus" viewBox="0 0 16 16">
                          <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                          <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </div>
                    <h3 style="font-weight: 700; color: var(--text-main); margin-bottom: 8px;">Buat Akun Baru</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem;">Mulai perjalanan profesional Anda dengan ElMatch.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Nama Lengkap / Instansi</label>
                        <input id="name" type="text" class="form-control form-control-premium @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukkan nama Anda">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Alamat Email</label>
                        <input id="email" type="email" class="form-control form-control-premium @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="nama@email.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="password" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Kata Sandi</label>
                            <input id="password" type="password" class="form-control form-control-premium @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="password-confirm" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Konfirmasi Sandi</label>
                            <input id="password-confirm" type="password" class="form-control form-control-premium" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi kata sandi">
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="role" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Mendaftar Sebagai</label>
                        <select id="role" class="form-select form-control-premium @error('role') is-invalid @enderror" name="role" required style="cursor: pointer;">
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Pencari Kerja (Job Seeker)</option>
                            <option value="company" {{ old('role') == 'company' ? 'selected' : '' }}>Perusahaan (Employer)</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator Sistem</option>
                        </select>

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="premium-btn py-3">
                            Daftar Sekarang
                        </button>
                    </div>
                    
                    <div class="text-center">
                        <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0;">Sudah memiliki akun? <a href="{{ route('login') }}" style="color: var(--accent-color); font-weight: 600; text-decoration: none;">Masuk di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
