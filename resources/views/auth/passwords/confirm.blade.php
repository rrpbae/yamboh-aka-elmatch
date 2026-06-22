@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="premium-card text-center border-0" style="padding: 48px 40px;">
                <div class="mb-4 d-flex justify-content-center">
                    <div style="background: var(--accent-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--accent-color)" class="bi bi-shield-lock" viewBox="0 0 16 16">
                          <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                          <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
                        </svg>
                    </div>
                </div>
                <h3 style="font-weight: 700; color: var(--text-main); margin-bottom: 8px;">Konfirmasi Kata Sandi</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 32px;">Harap konfirmasi kata sandi Anda sebelum melanjutkan.</p>

                <form method="POST" action="{{ route('password.confirm') }}" class="text-start">
                    @csrf

                    <div class="mb-4">
                        <label for="password" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Kata Sandi</label>
                        <input id="password" type="password" class="form-control form-control-premium @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-grid mb-4 mt-2">
                        <button type="submit" class="premium-btn py-3">
                            Konfirmasi Sandi
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-center mt-4">
                            <a href="{{ route('password.request') }}" style="color: var(--accent-color); font-weight: 600; font-size: 0.9rem; text-decoration: none;">
                                Lupa Kata Sandi?
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
