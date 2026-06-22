@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <!-- Header -->
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px;">Dashboard Perusahaan</h2>
            <p style="color: var(--text-muted); font-size: 1.05rem;">Kelola profil dan lowongan kerja untuk perusahaan Anda.</p>
        </div>
        <div class="col-md-4 text-md-end text-start mt-3 mt-md-0">
            <a href="{{ route('company.jobs.create') }}" class="premium-btn d-inline-flex align-items-center" style="padding: 10px 24px; font-size: 0.95rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-circle me-2" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
                Tambah Lowongan
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success premium-card mb-4 d-flex align-items-center" style="border-left: 5px solid var(--success-color); padding: 15px 20px; border-radius: 12px; background: #ecfdf5; color: var(--success-color); font-weight: 600;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill me-3" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Statistik Utama -->
    <div class="row mb-5">
        <!-- Profil Perusahaan -->
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="premium-card h-100 p-4">
                <div class="d-flex align-items-center mb-3">
                    <div style="background: var(--accent-light); width: 56px; height: 56px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin-right: 15px; flex-shrink: 0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="var(--accent-color)" class="bi bi-building-check" viewBox="0 0 16 16">
                          <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
                          <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
                          <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                    </div>
                    <div>
                        <h5 style="font-weight: 700; color: var(--text-main); margin: 0;">{{ $company->nama_perusahaan }}</h5>
                        <span class="glass-badge mt-1 d-inline-block px-2 py-1" style="font-size: 0.75rem;">Profil Lengkap</span>
                    </div>
                </div>
                <div style="background: var(--primary-bg); border-radius: 12px; padding: 12px;">
                    <div style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 8px;">
                        <strong style="color: var(--text-main); display: block; margin-bottom: 2px;">Alamat:</strong> 
                        {{ $company->alamat }}
                    </div>
                    <div style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 0;">
                        <strong style="color: var(--text-main); display: block; margin-bottom: 2px;">Kontak:</strong> 
                        {{ $company->kontak }}
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Total Lowongan -->
        <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
            <div class="premium-card text-center h-100 p-4">
                <div style="background: var(--warning-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--warning-color)" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                      <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                      <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                    </svg>
                </div>
                <h3 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px; font-size: 2rem;">{{ $jobs->count() }}</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin: 0;">Total Lowongan</p>
            </div>
        </div>

        <!-- Lowongan Aktif -->
        <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
            <div class="premium-card text-center h-100 p-4">
                <div style="background: var(--success-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--success-color)" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                </div>
                <h3 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px; font-size: 2rem;">{{ $jobs->where('status_open', true)->count() }}</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin: 0;">Lowongan Aktif</p>
            </div>
        </div>
    </div>

    <!-- Main Content: Job List -->
    <div class="row">
        <div class="col-12 mb-3">
            <h4 style="font-weight: 700; color: var(--text-main); margin: 0;">Daftar Lowongan Kerja</h4>
        </div>
        
        @if($jobs->count() > 0)
            @foreach($jobs as $job)
                <div class="col-12 mb-4">
                    <div class="premium-card" style="padding: 24px;">
                        <div class="row align-items-start">
                            <div class="col-md-9">
                                <div class="d-flex align-items-center mb-2">
                                    <h5 style="font-weight: 700; margin: 0; color: var(--text-main); font-size: 1.25rem;" class="me-3">{{ $job->posisi }}</h5>
                                    @if($job->status_open)
                                        <span class="badge" style="background: var(--success-light); color: var(--success-color); border: 1px solid #a7f3d0; border-radius: 50px; padding: 6px 14px; font-weight: 600;">Aktif</span>
                                    @else
                                        <span class="badge" style="background: var(--danger-light); color: var(--danger-color); border: 1px solid #fecaca; border-radius: 50px; padding: 6px 14px; font-weight: 600;">Ditutup</span>
                                    @endif
                                </div>
                                <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 16px; font-weight: 500;">Dibuat pada: {{ $job->created_at->format('d M Y') }}</p>

                                <div class="row mt-2 pt-3" style="border-top: 1px dashed var(--card-border);">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <h6 style="font-weight: 700; color: var(--text-main); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Deskripsi Pekerjaan:</h6>
                                        <div style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; background: var(--primary-bg); padding: 12px; border-radius: 12px; height: 100%;">
                                            {{ Str::limit($job->deskripsi, 120) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 style="font-weight: 700; color: var(--text-main); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Kualifikasi Utama:</h6>
                                        <div style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; background: var(--primary-bg); padding: 12px; border-radius: 12px; height: 100%;">
                                            {{ Str::limit($job->kualifikasi, 120) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="col-md-3 mt-4 mt-md-0 d-flex flex-md-column justify-content-end align-items-md-end gap-2">
                                <a href="{{ route('company.jobs.edit', $job->id) }}" class="premium-btn-outline w-100 text-center text-decoration-none" style="border-color: var(--accent-color); color: var(--accent-color);">
                                    Edit Lowongan
                                </a>
                                <form action="{{ route('company.jobs.destroy', $job->id) }}" method="POST" class="w-100" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="premium-btn-outline w-100" style="border-color: var(--danger-color); color: var(--danger-color);">
                                        Hapus Data
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="premium-card text-center py-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="#cbd5e1" class="bi bi-folder-x mb-4" viewBox="0 0 16 16">
                      <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31zM2.19 3c-.26 0-.47.15-.546.383C1.426 4.22 1.626 5 2.19 5h11.62c.564 0 .764-.78.546-1.617A.5.5 0 0 0 13.81 3z"/>
                      <path d="M11.854 10.146a.5.5 0 0 0-.707.708L12.293 12l-1.146 1.146a.5.5 0 0 0 .707.708L13 12.707l1.146 1.147a.5.5 0 0 0 .708-.708L13.707 12l1.147-1.146a.5.5 0 0 0-.708-.708L13 11.293z"/>
                    </svg>
                    <h5 style="color: var(--text-main); font-weight: 700; font-size: 1.25rem;">Belum Ada Lowongan</h5>
                    <p style="color: var(--text-muted); font-size: 1rem; max-width: 400px; margin: 0 auto;">Mulai publikasikan lowongan pertama Anda agar sistem AI kami dapat menyebarkannya kepada pencari kerja terbaik!</p>
                    <a href="{{ route('company.jobs.create') }}" class="premium-btn mt-4">Buat Lowongan Sekarang</a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
