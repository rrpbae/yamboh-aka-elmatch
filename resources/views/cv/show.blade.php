@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Sidebar: CV Info & Skills -->
        <div class="col-md-4 mb-4">
            <div class="premium-card">
                <a href="{{ route('user.cv.index') }}" class="text-decoration-none mb-4 d-inline-block" style="color: var(--text-muted); font-weight: 500;">&larr; Kembali</a>
                
                <div class="text-center mb-4">
                    <div style="background: rgba(67, 24, 255, 0.1); width: 80px; height: 80px; border-radius: 20px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="var(--accent-color)" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                            <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        </svg>
                    </div>
                    <h5 style="font-weight: 700; color: var(--text-main);">Profil AI Anda</h5>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">Diekstrak dari CV</p>
                </div>

                <hr style="border-color: rgba(163, 174, 209, 0.3);">

                <h6 style="font-weight: 600; color: var(--text-main);" class="mb-3">Keahlian (Skills) Ditemukan:</h6>
                <div class="d-flex flex-wrap gap-2">
                    @if(isset($cv->hasil_ai['skills']) && is_array($cv->hasil_ai['skills']))
                        @foreach($cv->hasil_ai['skills'] as $skill)
                            <span class="glass-badge">{{ $skill }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">Tidak ada skill spesifik yang ditemukan.</span>
                    @endif
                </div>

                @if(isset($cv->hasil_ai['experience_years']))
                <div class="mt-4">
                    <h6 style="font-weight: 600; color: var(--text-main);">Pengalaman:</h6>
                    <p style="color: var(--text-muted);">{{ $cv->hasil_ai['experience_years'] }} Tahun</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Main Content: Recommendations -->
        <div class="col-md-8">
            <h3 class="mb-4" style="font-weight: 700; color: var(--text-main);">Rekomendasi Pekerjaan Anda 🎯</h3>
            
            @if($recommendations->count() > 0)
                @foreach($recommendations as $rec)
                    @php
                        $scoreClass = $rec->score >= 80 ? 'score-high' : ($rec->score >= 50 ? 'score-med' : 'score-low');
                        $textColor = $rec->score >= 80 ? '#05cd99' : ($rec->score >= 50 ? '#ffce20' : '#ee5d50');
                    @endphp
                    <div class="premium-card mb-4 d-flex align-items-center">
                        <!-- Score Circle -->
                        <div class="score-circle {{ $scoreClass }} flex-shrink-0 me-4">
                            {{ round($rec->score) }}%
                        </div>
                        
                        <!-- Job Info -->
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h4 style="font-weight: 700; margin-bottom: 5px; color: var(--text-main);">{{ $rec->jobVacancy->posisi }}</h4>
                                    <h6 style="color: var(--text-muted); font-weight: 500;">
                                        🏢 {{ $rec->jobVacancy->company->nama_perusahaan ?? 'Perusahaan Rahasia' }}
                                    </h6>
                                </div>
                                <span class="badge" style="background-color: {{ $textColor }}; color: white; padding: 6px 12px; border-radius: 12px; font-weight: 600;">
                                    {{ $rec->score >= 80 ? 'Sangat Cocok' : ($rec->score >= 50 ? 'Cukup Cocok' : 'Kurang Cocok') }}
                                </span>
                            </div>
                            
                            <p class="mt-3 mb-0" style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                                {{ Str::limit($rec->jobVacancy->deskripsi, 120) }}
                            </p>
                        </div>

                        <!-- Action Button -->
                        <div class="ms-4">
                            <button class="btn btn-outline-primary rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;" title="Lihat Detail & Lamar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="premium-card text-center py-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="var(--text-muted)" class="bi bi-search mb-4 opacity-50" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                    <h5 style="color: var(--text-main); font-weight: 600;">Belum ada lowongan yang cocok</h5>
                    <p style="color: var(--text-muted);">Sistem kami belum menemukan lowongan yang sesuai dengan skill Anda saat ini. Jangan menyerah, coba lengkapi CV Anda!</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
