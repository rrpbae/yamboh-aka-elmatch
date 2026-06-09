@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="premium-card text-center border-0" style="padding: 48px 40px;">
                <div class="mb-4 d-flex justify-content-center">
                    <div style="background: var(--accent-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--accent-color)" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                          <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                    </div>
                </div>
                <h3 style="font-weight: 700; color: var(--text-main); margin-bottom: 8px;">Selamat Datang Kembali</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 32px;">Masuk ke akun Anda untuk melanjutkan.</p>

                <form method="POST" action="{{ route('login') }}" class="text-start">
                    @csrf

                    <div class="mb-4">
                        <label for="email" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Alamat Email</label>
                        <input id="email" type="email" class="form-control form-control-premium @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="nama@email.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Kata Sandi</label>
                        <input id="password" type="password" class="form-control form-control-premium @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="cursor: pointer;">
                            <label class="form-check-label text-muted" for="remember" style="font-size: 0.9rem; cursor: pointer; padding-top:2px;">
                                Ingat Saya
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none" href="{{ route('password.request') }}" style="color: var(--accent-color); font-weight: 600; font-size: 0.9rem;">
                                Lupa Kata Sandi?
                            </a>
                        @endif
                    </div>

                    <div class="d-grid mb-4 mt-2">
                        <button type="submit" class="premium-btn py-3">
                            Masuk
                        </button>
                    </div>

                    <div class="text-center">
                        <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0;">Belum memiliki akun? <a href="{{ route('register') }}" style="color: var(--accent-color); font-weight: 600; text-decoration: none;">Daftar Sekarang</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
