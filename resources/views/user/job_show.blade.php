@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="premium-card">
                <div class="d-flex align-items-center mb-4 pb-3" style="border-bottom: 1px solid var(--card-border);">
                    <a href="{{ route('user.dashboard') }}" class="btn btn-light" style="border: 1px solid var(--card-border); background: white; border-radius: 8px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; margin-right: 16px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                    </a>
                    <div>
                        <h3 style="font-weight: 700; color: var(--text-main); margin:0; font-size: 1.5rem;">{{ $job->posisi }}</h3>
                        <p style="color: var(--text-muted); font-size: 1rem; margin: 4px 0 0;">{{ $job->company->nama_perusahaan ?? 'Perusahaan Rahasia' }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h5 style="font-weight: 700; color: var(--text-main); border-bottom: 2px solid var(--primary-bg); padding-bottom: 8px; margin-bottom: 16px;">Deskripsi Pekerjaan</h5>
                            <div style="color: var(--text-muted); line-height: 1.7; white-space: pre-wrap;">{{ $job->deskripsi }}</div>
                        </div>

                        <div class="mb-4">
                            <h5 style="font-weight: 700; color: var(--text-main); border-bottom: 2px solid var(--primary-bg); padding-bottom: 8px; margin-bottom: 16px;">Kualifikasi & Persyaratan</h5>
                            <div style="color: var(--text-muted); line-height: 1.7; white-space: pre-wrap;">{{ $job->kualifikasi }}</div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="premium-card" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 20px;">
                            <h6 style="font-weight: 700; color: var(--text-main); text-transform: uppercase; font-size: 0.85rem; margin-bottom: 16px; letter-spacing: 0.5px;">Hubungi Rekruter</h6>
                            
                            @if($job->kontak_email)
                                <div class="mb-3">
                                    <div style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 4px;">Email:</div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-envelope-fill me-2" style="color: var(--accent-color); font-size: 1.2rem;"></i>
                                        <a href="mailto:{{ $job->kontak_email }}" style="color: var(--text-main); text-decoration: none; font-weight: 500;">{{ $job->kontak_email }}</a>
                                    </div>
                                </div>
                            @endif

                            @if($job->kontak_telepon)
                                <div class="mb-3">
                                    <div style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 4px;">No. Telepon / WhatsApp:</div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-whatsapp me-2" style="color: var(--success-color); font-size: 1.2rem;"></i>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $job->kontak_telepon) }}" target="_blank" style="color: var(--text-main); text-decoration: none; font-weight: 500;">{{ $job->kontak_telepon }}</a>
                                    </div>
                                </div>
                            @endif
                            
                            @if(!$job->kontak_email && !$job->kontak_telepon)
                                <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0;">Kontak belum tersedia.</p>
                            @endif
                        </div>
                        
                        <div class="mt-4 text-center">
                            <div style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 8px;">Diterbitkan pada:</div>
                            <div style="font-weight: 600; color: var(--text-main);">{{ $job->created_at->format('d M Y') }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
