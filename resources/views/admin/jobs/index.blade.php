@extends('layouts.app')

@section('content')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.03);
    }
    .table-hover-custom tbody tr {
        transition: all 0.2s ease;
        background: #fff;
    }
    .table-hover-custom tbody tr:hover {
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-radius: 8px;
        position: relative;
        z-index: 2;
    }
    .btn-action-delete {
        opacity: 0.7;
        transition: all 0.3s ease;
    }
    .btn-action-delete:hover {
        opacity: 1;
        transform: scale(1.1);
    }
</style>

<div class="container mt-4 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 style="font-weight: 800; color: var(--text-main); margin-bottom: 5px; letter-spacing: -0.5px;">Pantau Lowongan</h2>
            <p style="color: var(--text-muted); font-size: 1.05rem; margin:0;">Manajemen dan pemantauan data lowongan kerja di ElMatch.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark rounded-pill px-4">Kembali ke Dashboard</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 rounded-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-card p-4">
        @if($jobs->count() > 0)
            <div class="table-responsive" style="overflow-x: visible;">
                <table class="table table-borderless align-middle table-hover-custom w-100">
                    <thead>
                        <tr>
                            <th class="px-3" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Posisi Lowongan</th>
                            <th class="px-3" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Perusahaan</th>
                            <th class="px-3 text-center" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Status</th>
                            <th class="px-3" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Dibuat Pada</th>
                            <th class="px-3 text-end" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr style="border-bottom: 1px solid var(--card-border);">
                            <td class="p-3">
                                <div class="d-flex align-items-center">
                                    <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--warning-light); color: var(--warning-color); border: 2px solid #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.1rem; margin-right: 14px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                                          <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div style="font-weight: 800; font-size: 0.95rem; color: var(--text-main);">{{ $job->posisi }}</div>
                                        <div style="font-size: 0.8rem; color: var(--text-muted); max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ strip_tags($job->deskripsi) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-3">
                                <div style="color: var(--text-main); font-weight: 600; font-size: 0.9rem;">{{ $job->company->nama_perusahaan ?? 'Tanpa Perusahaan' }}</div>
                            </td>
                            <td class="p-3 text-center">
                                @if($job->status_open)
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill border border-success border-opacity-25">Aktif</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2 rounded-pill border border-secondary border-opacity-25">Ditutup</span>
                                @endif
                            </td>
                            <td class="p-3" style="color: var(--text-muted); font-size: 0.9rem;">
                                {{ $job->created_at->format('d M Y') }}
                            </td>
                            <td class="p-3 text-end">
                                <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle btn-action-delete" style="width:34px; height:34px; padding:0; display:inline-flex; align-items:center; justify-content:center;" title="Hapus Lowongan">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4 d-flex justify-content-center">
                {{ $jobs->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="text-center py-5">
                <p class="text-muted mb-0" style="font-size: 0.95rem;">Belum ada data lowongan kerja.</p>
            </div>
        @endif
    </div>
</div>
@endsection
