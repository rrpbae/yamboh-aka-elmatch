@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="premium-card">
                <div class="text-center mb-5">
                    <div style="background: var(--accent-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--accent-color)" class="bi bi-person-workspace" viewBox="0 0 16 16">
                          <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                          <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                        </svg>
                    </div>
                    <h3 style="font-weight: 700; color: var(--text-main); font-size: 1.5rem;">Selamat Datang, {{ Auth::user()->name }}</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem; margin-top: 8px;">Mulai perjalanan karir profesional Anda dengan mengunggah Curriculum Vitae terbaru.</p>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 mb-3">
                        <div class="p-4 rounded-4" style="background-color: var(--primary-bg); border: 1px solid var(--card-border); height: 100%; transition: all 0.2s;" onmouseover="this.style.borderColor='var(--accent-color)';" onmouseout="this.style.borderColor='var(--card-border)';">
                            <div class="d-flex align-items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--accent-color)" class="bi bi-file-earmark-arrow-up me-2" viewBox="0 0 16 16">
                                  <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/>
                                  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                </svg>
                                <h5 style="margin: 0; font-weight: 700; color: var(--text-main); font-size: 1rem;">Analisis AI Instan</h5>
                            </div>
                            <p style="color: var(--text-muted); font-size: 0.875rem; margin-bottom: 0;">Sistem kami mengekstrak keahlian dan pengalamanmu secara otomatis dengan akurasi tinggi.</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="p-4 rounded-4" style="background-color: var(--primary-bg); border: 1px solid var(--card-border); height: 100%; transition: all 0.2s;" onmouseover="this.style.borderColor='var(--accent-color)';" onmouseout="this.style.borderColor='var(--card-border)';">
                            <div class="d-flex align-items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--accent-color)" class="bi bi-briefcase me-2" viewBox="0 0 16 16">
                                  <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                <h5 style="margin: 0; font-weight: 700; color: var(--text-main); font-size: 1rem;">Matching Presisi</h5>
                            </div>
                            <p style="color: var(--text-muted); font-size: 0.875rem; margin-bottom: 0;">Dapatkan rekomendasi pekerjaan yang relevan dengan profilmu secara seketika.</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('user.cv.index') }}" class="premium-btn text-decoration-none" style="padding: 12px 32px; font-size: 1rem;">
                        Mulai Upload CV <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right ms-2" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
