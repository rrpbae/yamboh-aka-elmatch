@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar Info -->
        <div class="col-md-4 mb-4">
            <div class="premium-card text-center position-sticky" style="top: 20px;">
                <div style="background: linear-gradient(135deg, var(--accent-color) 0%, #7352ff 100%); width: 80px; height: 80px; border-radius: 50%; display:flex; align-items:center; justify-content:center; margin: 0 auto 20px; box-shadow: 0 10px 20px rgba(67, 24, 255, 0.3);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-building-check" viewBox="0 0 16 16">
                      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
                      <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
                      <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                    </svg>
                </div>
                <h4 style="font-weight: 700; color: var(--text-main);">{{ $company->nama_perusahaan }}</h4>
                <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 25px;">{{ $company->alamat }}</p>
                
                <div class="text-start">
                    <p style="font-size: 0.9rem; margin-bottom: 5px;"><strong style="color: var(--text-main);">Kontak:</strong> <br> <span style="color: var(--text-muted);">{{ $company->kontak }}</span></p>
                    <hr style="border-color: rgba(163, 174, 209, 0.3);">
                    <p style="font-size: 0.9rem; margin-bottom: 0;"><strong style="color: var(--text-main);">Total Lowongan:</strong> <br> <span class="glass-badge mt-2 d-inline-block">{{ $jobs->count() }} Lowongan</span></p>
                </div>
            </div>
        </div>

        <!-- Main Content: Job List -->
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 style="font-weight: 700; color: var(--text-main); margin:0;">Manajemen Lowongan</h3>
                <a href="{{ route('company.jobs.create') }}" class="premium-btn d-flex align-items-center" style="padding: 10px 20px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle me-2" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                    Tambah Lowongan
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success premium-card mb-4" style="border-left: 5px solid #05cd99; padding: 15px 20px; border-radius: 12px; background: rgba(5, 205, 153, 0.1); color: #04b386; font-weight: 600;">
                    {{ session('success') }}
                </div>
            @endif

            @if($jobs->count() > 0)
                @foreach($jobs as $job)
                    <div class="premium-card mb-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="d-flex align-items-center mb-2">
                                    <h4 style="font-weight: 700; margin: 0; color: var(--text-main);" class="me-3">{{ $job->posisi }}</h4>
                                    @if($job->status_open)
                                        <span class="badge" style="background: #05cd99; border-radius: 12px; padding: 6px 12px;">Aktif (Buka)</span>
                                    @else
                                        <span class="badge" style="background: #ee5d50; border-radius: 12px; padding: 6px 12px;">Ditutup</span>
                                    @endif
                                </div>
                                <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 15px;">Dibuat pada: {{ $job->created_at->format('d M Y') }}</p>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="d-flex gap-2">
                                <a href="{{ route('company.jobs.edit', $job->id) }}" class="btn btn-sm btn-outline-primary" style="border-radius: 8px;">
                                    Edit
                                </a>
                                <form action="{{ route('company.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;">Hapus</button>
                                </form>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 mb-3">
                                <h6 style="font-weight: 600; color: var(--text-main);">Deskripsi Pekerjaan:</h6>
                                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">{{ Str::limit($job->deskripsi, 150) }}</p>
                            </div>
                            <div class="col-12">
                                <h6 style="font-weight: 600; color: var(--text-main);">Kualifikasi Utama:</h6>
                                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom:0;">{{ Str::limit($job->kualifikasi, 150) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="premium-card text-center py-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="var(--text-muted)" class="bi bi-folder-x mb-4 opacity-50" viewBox="0 0 16 16">
                      <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31zM2.19 3c-.26 0-.47.15-.546.383C1.426 4.22 1.626 5 2.19 5h11.62c.564 0 .764-.78.546-1.617A.5.5 0 0 0 13.81 3z"/>
                      <path d="M11.854 10.146a.5.5 0 0 0-.707.708L12.293 12l-1.146 1.146a.5.5 0 0 0 .707.708L13 12.707l1.146 1.147a.5.5 0 0 0 .708-.708L13.707 12l1.147-1.146a.5.5 0 0 0-.708-.708L13 11.293z"/>
                    </svg>
                    <h5 style="color: var(--text-main); font-weight: 600;">Belum ada lowongan pekerjaan</h5>
                    <p style="color: var(--text-muted);">Mulai publikasikan lowongan pertama Anda agar sistem AI kami dapat menyebarkannya kepada pencari kerja terbaik!</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
