@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5" style="max-width: 800px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px;">Edit Data Pengguna</h2>
            <p style="color: var(--text-muted); font-size: 1.05rem;">Perbarui informasi atau ganti kata sandi pengguna.</p>
        </div>
        <div>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary rounded-pill fw-bold px-4">Kembali</a>
        </div>
    </div>

    <div class="premium-card p-4 p-md-5">
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="form-label" style="font-weight: 700; color: var(--text-main);">Nama Lengkap</label>
                <input id="name" type="text" class="form-control form-control-premium @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="form-label" style="font-weight: 700; color: var(--text-main);">Alamat Email</label>
                <input id="email" type="email" class="form-control form-control-premium @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="mb-5">
                <label for="role" class="form-label" style="font-weight: 700; color: var(--text-main);">Peran (Role)</label>
                <select id="role" class="form-select form-control-premium @error('role') is-invalid @enderror" name="role" required>
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>Pelamar (Pencari Kerja)</option>
                    <option value="company" {{ old('role', $user->role) == 'company' ? 'selected' : '' }}>Perusahaan</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator</option>
                </select>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <hr class="mb-4" style="border-color: var(--card-border);">
            <h5 class="mb-4" style="font-weight: 700; color: var(--text-main);">Ubah Kata Sandi (Opsional)</h5>
            <p class="text-muted" style="font-size: 0.9rem; margin-top: -15px;">Kosongkan jika tidak ingin mengubah kata sandi.</p>

            <div class="mb-4">
                <label for="password" class="form-label" style="font-weight: 700; color: var(--text-main);">Kata Sandi Baru</label>
                <input id="password" type="password" class="form-control form-control-premium @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Minimal 8 karakter">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password-confirm" class="form-label" style="font-weight: 700; color: var(--text-main);">Konfirmasi Kata Sandi Baru</label>
                <input id="password-confirm" type="password" class="form-control form-control-premium" name="password_confirmation" autocomplete="new-password" placeholder="Ulangi kata sandi baru">
            </div>

            <div class="d-grid">
                <button type="submit" class="premium-btn py-3" style="font-size: 1.1rem;">
                    Perbarui Data Pengguna
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
