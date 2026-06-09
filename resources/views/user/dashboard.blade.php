@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Glassmorphism Welcome Card -->
            <div class="premium-card text-center mb-5">
                <div class="mb-4">
                    <span class="glass-badge">Halo, {{ Auth::user()->name }} 👋</span>
                </div>
                <h2 class="font-weight-bold mb-3" style="font-size: 2.5rem; color: var(--text-main);">Selamat Datang di <span style="color: var(--accent-color);">ElMatch</span></h2>
                <p style="color: var(--text-muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto 30px;">
                    Sistem kami menggunakan kecerdasan buatan untuk menganalisis CV Anda dan mencocokkannya dengan lowongan pekerjaan terbaik yang tersedia.
                </p>
                <a href="{{ route('user.cv.index') }}" class="premium-btn text-decoration-none d-inline-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-up me-2" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708z"/>
                      <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                    </svg>
                    Mulai Unggah CV
                </a>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="premium-card h-100 d-flex flex-column justify-content-center align-items-center text-center">
                        <div style="background: rgba(5, 205, 153, 0.1); width: 70px; height: 70px; border-radius: 50%; display:flex; align-items:center; justify-content:center; margin-bottom: 20px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#05cd99" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                              <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                              <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                            </svg>
                        </div>
                        <h4 style="font-weight: 700;">Analisis Cerdas</h4>
                        <p style="color: var(--text-muted); font-size: 0.95rem;">Xetel AI mengekstrak data dari CV Anda dalam hitungan detik.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="premium-card h-100 d-flex flex-column justify-content-center align-items-center text-center">
                        <div style="background: rgba(255, 206, 32, 0.1); width: 70px; height: 70px; border-radius: 50%; display:flex; align-items:center; justify-content:center; margin-bottom: 20px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#ffce20" class="bi bi-bullseye" viewBox="0 0 16 16">
                              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                              <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10m0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                              <path d="M8 11A3 3 0 1 1 8 5a3 3 0 0 1 0 6m0 1A4 4 0 1 0 8 4a4 4 0 0 0 0 8"/>
                              <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                            </svg>
                        </div>
                        <h4 style="font-weight: 700;">Cocok & Akurat</h4>
                        <p style="color: var(--text-muted); font-size: 0.95rem;">Algoritma kami mencarikan pekerjaan yang paling sesuai dengan profil Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
