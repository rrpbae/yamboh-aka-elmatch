@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <div class="d-flex align-items-center mb-4 pb-3" style="border-bottom: 1px solid var(--card-border);">
        <a href="{{ route('user.cv.index') }}" class="btn btn-light" style="border: 1px solid var(--card-border); background: var(--card-bg); border-radius: 8px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; margin-right: 16px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
        </a>
        <h3 style="font-weight: 700; color: var(--text-main); margin: 0; font-size: 1.5rem;">Hasil Analisis & Rekomendasi</h3>
    </div>

    <div class="row">
        <!-- Sidebar AI Summary -->
        <div class="col-md-4 mb-4">
            <div class="premium-card h-100">
                <div class="d-flex align-items-center mb-4 pb-3" style="border-bottom: 1px solid var(--card-border);">
                    <div style="background: var(--accent-light); width: 48px; height: 48px; border-radius: 12px; display:flex; align-items:center; justify-content:center; margin-right: 16px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="var(--accent-color)" class="bi bi-cpu" viewBox="0 0 16 16">
                          <path d="M5 0h6v1H5V0zm7 1h1v1h-1V1zm1 2h1v6h-1V3zm0 7h1v1h-1v-1zm-1 2h1v1h-1v-1zm-7 1h6v1H5v-1zm-1-1H3v1h1v-1zm-1-2H2V3h1v7zm0-8H2V1h1v1z"/>
                          <path d="M4 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"/>
                          <path d="M6 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-3zM6.5 5v2h2V5h-2z"/>
                        </svg>
                    </div>
                    <div>
                        <h5 style="font-weight: 700; color: var(--text-main); margin: 0; font-size: 1.1rem;">Ekstraksi Profil</h5>
                        <p style="color: var(--text-muted); font-size: 0.85rem; margin: 0;">Diproses oleh AI</p>
                    </div>
                </div>

                @php
                    $hasilAi = is_string($cv->hasil_ai) ? json_decode($cv->hasil_ai, true) : $cv->hasil_ai;
                @endphp

                <div class="mb-4">
                    <h6 style="font-weight: 700; color: var(--text-main); font-size: 0.95rem; margin-bottom: 12px; display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--success-color)" class="bi bi-check2-square me-2" viewBox="0 0 16 16">
                          <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                          <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                        </svg>
                        Keahlian Terdeteksi
                    </h6>
                    <div>
                        @if(isset($hasilAi['skills']) && is_array($hasilAi['skills']) && count($hasilAi['skills']) > 0)
                            @foreach($hasilAi['skills'] as $skill)
                                <span class="glass-badge me-1 mb-2 d-inline-block">{{ $skill }}</span>
                            @endforeach
                        @else
                            <p style="color: var(--text-muted); font-size: 0.9rem;">Sistem tidak mendeteksi keahlian spesifik.</p>
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <h6 style="font-weight: 700; color: var(--text-main); font-size: 0.95rem; margin-bottom: 12px; display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--warning-color)" class="bi bi-clock-history me-2" viewBox="0 0 16 16">
                          <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
                          <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                          <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                        Estimasi Pengalaman
                    </h6>
                    <p style="color: var(--text-main); font-weight: 700; font-size: 1.1rem; background: var(--primary-bg); border: 1px solid var(--card-border); padding: 8px 16px; border-radius: 8px; display: inline-block;">
                        {{ $hasilAi['experience_years'] ?? 0 }} Tahun
                    </p>
                </div>

                <div>
                    <h6 style="font-weight: 700; color: var(--text-main); font-size: 0.95rem; margin-bottom: 12px; display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--accent-color)" class="bi bi-journal-text me-2" viewBox="0 0 16 16">
                          <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                          <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                          <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                        </svg>
                        Ringkasan Profil
                    </h6>
                    <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; text-align: justify; padding: 12px; background: var(--primary-bg); border-radius: 8px; border: 1px solid var(--card-border);">
                        Berdasarkan data, profil direkomendasikan menempati posisi 
                        @if(($hasilAi['experience_years'] ?? 0) > 3)
                            <strong style="color: var(--text-main);">Menengah (Mid-Level) hingga Senior</strong>
                        @else
                            <strong style="color: var(--text-main);">Pemula (Junior/Entry-Level)</strong>
                        @endif 
                        di bidang yang relevan.
                    </p>
                </div>

                @if(isset($hasilAi['suggestions']) && is_array($hasilAi['suggestions']) && count($hasilAi['suggestions']) > 0)
                <div class="mt-4 pt-3" style="border-top: 1px solid var(--card-border);">
                    <h6 style="font-weight: 700; color: var(--text-main); font-size: 0.95rem; margin-bottom: 12px; display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--warning-color)" class="bi bi-lightbulb me-2" viewBox="0 0 16 16">
                          <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.459-.287l-.761-1.768c-.094-.219-.25-.423-.453-.619A6 6 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>
                        </svg>
                        Saran Perbaikan CV (AI)
                    </h6>
                    <ul style="color: var(--text-muted); font-size: 0.85rem; padding-left: 1rem;">
                        @foreach($hasilAi['suggestions'] as $saran)
                            <li class="mb-2">{{ $saran }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <!-- Main Content Job Matches -->
        <div class="col-md-8">
            <h4 style="font-weight: 700; color: var(--text-main); margin-bottom: 24px; font-size: 1.25rem;">Rekomendasi Posisi</h4>

            @if(count($recommendations) > 0)
                @foreach($recommendations as $rec)
                    <div class="premium-card mb-4" style="padding: 24px;">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="d-flex w-100">
                                <!-- Modern SVG Score Circle -->
                                @php
                                    $score = round($rec->score);
                                    
                                    $colorClass = 'text-danger';
                                    $strokeColor = '#ef4444'; // Red 500
                                    $statusText = 'Kurang Cocok';
                                    
                                    if($score >= 80) {
                                        $colorClass = 'text-success';
                                        $strokeColor = '#10b981'; // Emerald 500
                                        $statusText = 'Sangat Cocok';
                                    } elseif($score >= 50) {
                                        $colorClass = 'text-warning';
                                        $strokeColor = '#f59e0b'; // Amber 500
                                        $statusText = 'Cocok';
                                    }
                                @endphp
                                <div class="d-flex flex-column align-items-center me-4 flex-shrink-0">
                                    <div class="position-relative d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <!-- Track Circle -->
                                        <svg class="position-absolute" width="80" height="80" viewBox="0 0 100 100">
                                            <circle cx="50" cy="50" r="40" fill="none" stroke="#f1f5f9" stroke-width="8"></circle>
                                            <!-- Progress Circle -->
                                            <circle cx="50" cy="50" r="40" fill="none" stroke="{{ $strokeColor }}" stroke-width="8" 
                                                    stroke-dasharray="251.2" stroke-dashoffset="{{ 251.2 - (251.2 * $score / 100) }}" 
                                                    stroke-linecap="round" transform="rotate(-90 50 50)" style="transition: stroke-dashoffset 1s ease-in-out;"></circle>
                                        </svg>
                                        <span style="font-weight: 800; font-size: 1.4rem; color: var(--text-main); z-index: 1;">{{ $score }}<span style="font-size: 0.8rem;">%</span></span>
                                    </div>
                                    <span class="mt-2 {{ $colorClass }}" style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">{{ $statusText }}</span>
                                </div>
                                
                                <div class="w-100">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h5 style="font-weight: 700; color: var(--text-main); margin-bottom: 4px; font-size: 1.2rem;">{{ $rec->jobVacancy->posisi }}</h5>
                                            <p style="color: var(--accent-color); font-weight: 600; font-size: 0.95rem; margin-bottom: 16px;">
                                                {{ $rec->jobVacancy->company->nama_perusahaan ?? 'Perusahaan Tidak Diketahui' }}
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 p-3 rounded" style="background: var(--primary-bg); border: 1px solid var(--card-border);">
                                        <h6 style="font-size: 0.8rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;">Kualifikasi yang Dicari:</h6>
                                        <p style="font-size: 0.9rem; color: var(--text-main); line-height: 1.5; margin-bottom: 0;">{{ $rec->jobVacancy->kualifikasi }}</p>
                                    </div>
                                    
                                    <div class="text-end mt-3">
                                        <a href="{{ route('user.jobs.show', $rec->jobVacancy->id) }}" class="premium-btn text-decoration-none" style="font-size: 0.9rem; padding: 8px 24px;">
                                            Lihat Detail Lowongan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="premium-card text-center py-5">
                    <div style="background: var(--primary-bg); width: 80px; height: 80px; border-radius: 50%; display:flex; align-items:center; justify-content:center; margin: 0 auto 20px; border: 1px solid var(--card-border);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text-muted)" class="bi bi-search opacity-50" viewBox="0 0 16 16">
                          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </div>
                    <h5 style="color: var(--text-main); font-weight: 700; font-size: 1.2rem;">Belum Ada Kecocokan</h5>
                    <p style="color: var(--text-muted); font-size: 0.95rem; max-w: 400px; margin: 0 auto;">Saat ini belum ada lowongan kerja yang relevan dengan kualifikasi pada dokumen Anda. Silakan periksa kembali secara berkala.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
