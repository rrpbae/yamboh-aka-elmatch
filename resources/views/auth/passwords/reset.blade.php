@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="premium-card text-center border-0" style="padding: 48px 40px;">
                <div class="mb-4 d-flex justify-content-center">
                    <div style="background: var(--accent-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--accent-color)" class="bi bi-key" viewBox="0 0 16 16">
                          <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647L13.793 8l-1.147-1.146h-5.48a.5.5 0 0 1-.46-.302A3 3 0 0 0 4 5z"/>
                          <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 style="font-weight: 700; color: var(--text-main); margin-bottom: 8px;">Atur Ulang Sandi</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 32px;">Buat kata sandi baru untuk akun Anda.</p>

                <form method="POST" action="{{ route('password.update') }}" class="text-start">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-4">
                        <label for="email" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Alamat Email</label>
                        <input id="email" type="email" class="form-control form-control-premium @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Kata Sandi Baru</label>
                        <input id="password" type="password" class="form-control form-control-premium @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="••••••••">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" style="font-weight: 600; color: var(--text-main); font-size: 0.9rem; margin-bottom: 8px; display: block;">Konfirmasi Kata Sandi</label>
                        <input id="password-confirm" type="password" class="form-control form-control-premium" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                    </div>

                    <div class="d-grid mb-4 mt-2">
                        <button type="submit" class="premium-btn py-3">
                            Simpan Kata Sandi Baru
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
