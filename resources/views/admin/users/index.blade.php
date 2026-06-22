@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px;">Manajemen Pengguna</h2>
            <p style="color: var(--text-muted); font-size: 1.05rem;">Kelola data pencari kerja, perusahaan, dan admin.</p>
        </div>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary me-2 rounded-pill fw-bold px-4">Kembali</a>
            <a href="{{ route('admin.users.create') }}" class="premium-btn text-decoration-none">Tambah Pengguna</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3 mb-4" style="background: var(--success-light); color: var(--success-color); border: 1px solid var(--success-color);">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger rounded-3 mb-4" style="background: var(--danger-light); color: var(--danger-color); border: 1px solid var(--danger-color);">
            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ session('error') }}
        </div>
    @endif

    <div class="premium-card p-4">
        <div class="table-responsive">
            <table class="table table-borderless align-middle" style="color: var(--text-main);">
                <thead style="border-bottom: 2px solid var(--primary-bg);">
                    <tr>
                        <th class="py-3 px-2" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">ID</th>
                        <th class="py-3 px-2" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Nama</th>
                        <th class="py-3 px-2" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Email</th>
                        <th class="py-3 px-2" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Peran (Role)</th>
                        <th class="py-3 px-2 text-end" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr style="border-bottom: 1px solid var(--primary-bg);">
                        <td class="py-3 px-2" style="font-weight: 600;">#{{ $user->id }}</td>
                        <td class="py-3 px-2" style="font-weight: 700;">{{ $user->name }}</td>
                        <td class="py-3 px-2" style="color: var(--text-muted);">{{ $user->email }}</td>
                        <td class="py-3 px-2">
                            @if($user->role === 'admin')
                                <span class="glass-badge" style="background: var(--danger-light); color: var(--danger-color); border-color: rgba(239, 68, 68, 0.2);">Admin</span>
                            @elseif($user->role === 'company')
                                <span class="glass-badge" style="background: var(--success-light); color: var(--success-color); border-color: rgba(16, 185, 129, 0.2);">Perusahaan</span>
                            @else
                                <span class="glass-badge">Pelamar</span>
                            @endif
                        </td>
                        <td class="py-3 px-2 text-end">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary rounded-pill fw-bold px-3 me-1">Edit</a>
                            
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill fw-bold px-3">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">Belum ada data pengguna.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
