@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px;">Manajemen Lowongan</h2>
            <p style="color: var(--text-muted); font-size: 1.05rem;">Pantau dan hapus lowongan kerja yang tidak sesuai kriteria.</p>
        </div>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary rounded-pill fw-bold px-4">Kembali</a>
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
                        <th class="py-3 px-2" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Perusahaan</th>
                        <th class="py-3 px-2" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Posisi Lowongan</th>
                        <th class="py-3 px-2" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Kualifikasi (Skills)</th>
                        <th class="py-3 px-2" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Status</th>
                        <th class="py-3 px-2 text-end" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                    <tr style="border-bottom: 1px solid var(--primary-bg);">
                        <td class="py-3 px-2">
                            <div class="d-flex align-items-center">
                                <div style="width: 36px; height: 36px; border-radius: 8px; background: var(--success-light); color: var(--success-color); border: 1px solid var(--card-border); display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                      <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                                      <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/>
                                    </svg>
                                </div>
                                <div style="font-weight: 700; font-size: 0.95rem; color: var(--accent-hover);">
                                    {{ $job->company->nama_perusahaan ?? 'Perusahaan Dihapus' }}
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-2">
                            <div style="font-weight: 700; font-size: 1rem;">{{ $job->posisi }}</div>
                            <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 4px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $job->deskripsi }}
                            </div>
                        </td>
                        <td class="py-3 px-2">
                            <span style="font-weight: 600; color: var(--text-muted); font-size: 0.85rem; background: var(--primary-bg); padding: 4px 8px; border-radius: 4px; border: 1px solid var(--card-border);">
                                {{ Str::limit($job->kualifikasi, 40) }}
                            </span>
                        </td>
                        <td class="py-3 px-2">
                            @if($job->status_open)
                                <span class="glass-badge" style="background: var(--success-light); color: var(--success-color); border-color: rgba(16, 185, 129, 0.2);">Dibuka</span>
                            @else
                                <span class="glass-badge" style="background: var(--danger-light); color: var(--danger-color); border-color: rgba(239, 68, 68, 0.2);">Ditutup</span>
                            @endif
                        </td>
                        <td class="py-3 px-2 text-end">
                            <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lowongan kerja ini? Tindakan ini tidak dapat dibatalkan.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill fw-bold px-3">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div style="background: var(--warning-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--warning-color)" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                  <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                                  <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                                </svg>
                            </div>
                            <p class="text-muted mb-0" style="font-size: 0.95rem; font-weight: 600;">Belum ada lowongan kerja yang terdaftar.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $jobs->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
