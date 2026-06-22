@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <!-- Header -->
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px;">Dashboard Pelamar</h2>
            <p style="color: var(--text-muted); font-size: 1.05rem;">Kelola Curriculum Vitae dan temukan pekerjaan impian Anda.</p>
        </div>
        <div class="col-md-4 text-md-end text-start mt-3 mt-md-0">
            @if($cvs->count() > 0)
                <a href="{{ route('user.cv.index') }}" class="premium-btn d-inline-flex align-items-center" style="padding: 10px 24px; font-size: 0.95rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cloud-arrow-up-fill me-2" viewBox="0 0 16 16">
                      <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
                    </svg>
                    Perbarui CV
                </a>
            @endif
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

    @if($cvs->count() == 0)
        <!-- EMPTY STATE (Belum ada CV) -->
        <div class="premium-card text-center p-5 mb-5" style="background: linear-gradient(135deg, #ffffff 0%, var(--primary-bg) 100%);">
            <div style="background: var(--accent-light); width: 80px; height: 80px; border-radius: 20px; display:flex; align-items:center; justify-content:center; margin: 0 auto 25px; box-shadow: 0 10px 25px rgba(14, 165, 233, 0.15);">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="var(--accent-color)" class="bi bi-person-workspace" viewBox="0 0 16 16">
                  <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                  <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                </svg>
            </div>
            
            <h3 style="font-weight: 800; color: var(--text-main); font-size: 1.8rem; letter-spacing: -0.5px;">Selamat Datang, {{ Auth::user()->name }}</h3>
            <p style="color: var(--text-muted); font-size: 1.1rem; max-width: 600px; margin: 15px auto 40px;">Mulai perjalanan karir profesional Anda bersama ElMatch. Sistem AI kami siap membantu Anda menemukan kecocokan karir terbaik.</p>
            
            <div class="row justify-content-center mb-5 g-4">
                <div class="col-md-5">
                    <div class="p-4 rounded-4 text-start h-100" style="background-color: #fff; border: 1px solid var(--card-border); box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
                        <div class="d-flex align-items-center mb-3">
                            <div style="width: 40px; height: 40px; background: var(--accent-light); border-radius: 10px; display:flex; align-items:center; justify-content:center; margin-right: 15px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--accent-color)" class="bi bi-robot" viewBox="0 0 16 16">
                                  <path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.889a28.688 28.688 0 0 1 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z"/>
                                  <path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z"/>
                                </svg>
                            </div>
                            <h5 style="margin: 0; font-weight: 700; color: var(--text-main); font-size: 1.1rem;">Analisis AI Instan</h5>
                        </div>
                        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 0; line-height: 1.6;">Algoritma kami mengekstrak keahlian, pengalaman, dan pendidikan dari CV Anda secara otomatis dengan akurasi tinggi.</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="p-4 rounded-4 text-start h-100" style="background-color: #fff; border: 1px solid var(--card-border); box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
                        <div class="d-flex align-items-center mb-3">
                            <div style="width: 40px; height: 40px; background: var(--success-light); border-radius: 10px; display:flex; align-items:center; justify-content:center; margin-right: 15px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--success-color)" class="bi bi-bullseye" viewBox="0 0 16 16">
                                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                  <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                                  <path d="M8 11A3 3 0 1 1 8 5a3 3 0 0 1 0 6zm0 1A4 4 0 1 0 8 4a4 4 0 0 0 0 8z"/>
                                  <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                </svg>
                            </div>
                            <h5 style="margin: 0; font-weight: 700; color: var(--text-main); font-size: 1.1rem;">Matching Presisi</h5>
                        </div>
                        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 0; line-height: 1.6;">Dapatkan rekomendasi lowongan pekerjaan yang paling relevan dengan profil dan keahlian Anda secara seketika.</p>
                    </div>
                </div>
            </div>
            
            <a href="{{ route('user.cv.index') }}" class="premium-btn text-decoration-none d-inline-flex align-items-center" style="padding: 14px 40px; font-size: 1.1rem; border-radius: 50px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-arrow-up-fill me-2" viewBox="0 0 16 16">
                  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M6.354 9.854a.5.5 0 0 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 8.707V12.5a.5.5 0 0 1-1 0V8.707L6.354 9.854z"/>
                </svg>
                Unggah CV Anda Sekarang
            </a>
        </div>
        
    @else
        <!-- DASHBOARD TERISI (Ada CV) -->
        <div class="row">
            <!-- Left Column: CV & Stats -->
            <div class="col-lg-8 mb-4">
                @php $latestCv = $cvs->first(); @endphp
                
                <!-- Status CV Card -->
                <div class="premium-card p-4 mb-4 position-relative overflow-hidden">
                    <div style="position: absolute; right: -20px; top: -20px; opacity: 0.05; transform: rotate(-15deg);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                          <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z"/>
                        </svg>
                    </div>
                    
                    <div class="position-relative z-index-1">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div class="d-flex align-items-center">
                                <div style="width: 56px; height: 56px; background: var(--accent-light); border-radius: 14px; display:flex; align-items:center; justify-content:center; margin-right: 16px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--accent-color)" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16">
                                      <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 style="font-weight: 700; color: var(--text-main); margin: 0; font-size: 1.3rem;">Status CV Anda</h4>
                                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 0;">Diperbarui: {{ $latestCv->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                            
                            @if($latestCv->is_parsed)
                                <span class="badge" style="background: #ecfdf5; color: var(--success-color); border: 1px solid #a7f3d0; border-radius: 50px; padding: 8px 16px; font-weight: 600; font-size: 0.85rem;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-check-circle-fill me-1" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                                    Analisis Selesai
                                </span>
                            @else
                                <span class="badge" style="background: var(--warning-light); color: var(--warning-color); border: 1px solid #fcd34d; border-radius: 50px; padding: 8px 16px; font-weight: 600; font-size: 0.85rem;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-hourglass-split me-1" viewBox="0 0 16 16"><path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.526.29.645.766 1.229 1.535 1.594C6.832 6.307 7 6.645 7 7.02c0 .375-.168.713-.628.932-.769.365-1.245.95-1.535 1.594A3.498 3.498 0 0 0 4.5 11v1h7v-1c0-.537-.12-1.045-.337-1.526-.29-.645-.766-1.229-1.535-1.594-.46-.219-.628-.557-.628-.932 0-.375.168-.713.628-.932.769-.365 1.245-.95 1.535-1.594A3.498 3.498 0 0 0 11.5 4V3h-7z"/></svg>
                                    Menunggu Analisis
                                </span>
                            @endif
                        </div>
                        
                        <div class="p-3" style="background: var(--primary-bg); border-radius: 12px; border: 1px dashed var(--card-border);">
                            <div class="d-flex align-items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--text-muted)" class="bi bi-file-pdf-fill me-2" viewBox="0 0 16 16"><path d="M5.523 10.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.223.006c-.05-.026-.067-.08-.077-.116a.593.593 0 0 1 .015-.24c.015-.05.045-.109.08-.168.08-.13.2-.28.38-.423zm.459-2.647c-.015.023-.03.048-.045.074-.038.067-.075.138-.112.212-.224.444-.45 1.082-.67 1.745-.024.072-.047.144-.07.215.35-.11.71-.23 1.08-.36.19-.06.38-.13.57-.2-.1-.31-.2-.61-.28-.9-.05-.18-.1-.36-.14-.54a50.793 50.793 0 0 1-.29-1.15zM7.5 8.3c.01-.03.03-.07.05-.11.05-.1.11-.22.18-.34a7.323 7.323 0 0 1 .44-.71c-.05.06-.1.12-.14.19a4.124 4.124 0 0 0-.27.53c-.06.13-.11.26-.16.39l-.1.29zM8 3.5a1 1 0 0 0-.5.5c0 .24.08.61.16 1 .08.38.19.82.32 1.34.22-.09.43-.19.64-.3.07-.04.15-.08.22-.12a.81.81 0 0 0 .28-.35c.04-.08.06-.18.06-.29 0-.25-.09-.54-.27-.72C8.75 4.06 8.46 3.5 8 3.5zm-3.8 6.4c-.1-.1-.3-.2-.5-.1-.2 0-.3.2-.4.4-.1.2-.1.5 0 .8.1.3.2.6.4.8.1-.1.2-.3.3-.6.1-.3.2-.6.2-.9zM12.5 8c-.3-.08-.6-.2-1-.4a8.13 8.13 0 0 0-1.4-.6c.5-.4.9-.8 1.3-1.2.4-.4.8-.8 1-1.1.2-.2.3-.4.3-.6v-.1c0-.1 0-.1-.02-.1-.02 0-.05.02-.1.08-.06.07-.15.18-.28.34-.16.19-.36.44-.6.76-.23.3-.48.65-.77 1.03-.26.35-.55.72-.85 1.08.38.2.78.3 1.15.3.38 0 .68-.08.82-.2.1-.1.14-.2.13-.3z"/><path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 8.668c.09.18.23.343.438.419.206.075.412.04.593-.076.182-.116.368-.291.563-.522a52.41 52.41 0 0 0 1.258-1.597c.365.178.718.397 1.05.65.234.178.47.38.71.603.226.211.455.441.696.69.215.222.428.462.636.717.202.247.394.502.573.766.173.256.326.51.465.759.135.242.247.476.328.694.062.167.106.315.127.433.023.13-.008.238-.086.32a.576.576 0 0 1-.365.173c-.15.019-.328-.016-.525-.1-.19-.081-.39-.202-.596-.363-.207-.16-.412-.35-.613-.564-.202-.213-.404-.45-.604-.707-.2-.256-.399-.526-.595-.81a34.332 34.332 0 0 0-.584-.87c-.19-.296-.379-.604-.567-.923a41.074 41.074 0 0 0-1.07-1.92c-.378.118-.764.22-1.155.304-.39.083-.787.151-1.19.203a35.842 35.842 0 0 1-2.453.228c-.379.018-.737.01-1.076-.025a5.53 5.53 0 0 1-1.058-.19c-.313-.087-.56-.23-.742-.423-.18-.194-.27-.45-.27-.768a1.272 1.272 0 0 1 .158-.64c.106-.205.253-.393.442-.556a2.023 2.023 0 0 1 .65-.395c.24-.094.5-.152.775-.17a3.468 3.468 0 0 1 .917.067c.31.066.619.186.924.356a4.85 4.85 0 0 1 .865.626 5.378 5.378 0 0 1 .744.82c.224.303.418.636.58.995a5.617 5.617 0 0 1 .288 1.118l.012.06c.005.03.01.059.014.088a.294.294 0 0 1-.06.216.326.326 0 0 1-.197.106.376.376 0 0 1-.223-.028c-.068-.028-.13-.07-.184-.124-.055-.054-.105-.118-.15-.19-.044-.07-.08-.147-.11-.226-.028-.08-.046-.164-.054-.25a1.144 1.144 0 0 1 .035-.348 1.488 1.488 0 0 1 .128-.358c.053-.11.115-.213.185-.308a1.956 1.956 0 0 1 .253-.263c.094-.081.196-.153.303-.213.108-.061.222-.11.341-.148a.952.952 0 0 1 .374-.037c.123.014.24.043.348.086.108.043.208.1.3.17a1.157 1.157 0 0 1 .238.256c.07.1.13.206.177.316.048.11.085.225.109.345a1.59 1.59 0 0 1 .02.378c-.004.126-.024.254-.06.381a1.867 1.867 0 0 1-.157.411 2.505 2.505 0 0 1-.302.463c-.116.143-.247.276-.39.4a3.86 3.86 0 0 1-.486.353c-.173.11-.358.204-.552.28a3.171 3.171 0 0 1-.62.176 3.142 3.142 0 0 1-.645.03c-.216-.01-.43-.046-.638-.106a2.034 2.034 0 0 1-.58-.26c-.18-.112-.344-.246-.49-.395a1.815 1.815 0 0 1-.354-.53c-.097-.2-.17-.411-.218-.629a2.766 2.766 0 0 1-.044-.658c.01-.224.043-.446.098-.663a3.344 3.344 0 0 1 .212-.66c.09-.214.202-.418.334-.61a3.528 3.528 0 0 1 .478-.544 3.812 3.812 0 0 1 .632-.464c.23-.136.477-.25.732-.34.256-.09.524-.158.799-.2.274-.043.553-.065.834-.065.281 0 .56.022.834.065.275.042.543.11.799.2.255.09.502.204.732.34.22.127.432.282.632.464.2.181.383.385.544.606.162.222.302.462.418.718.115.255.205.525.267.804.062.278.093.567.093.859 0 .292-.031.58-.093.859a4.276 4.276 0 0 1-.267.804c-.116.256-.256.496-.418.718a3.896 3.896 0 0 1-.544.606 3.655 3.655 0 0 1-.632.464c-.23.136-.477.25-.732.34a4.42 4.42 0 0 1-.799.2 5.09 5.09 0 0 1-.834.065 5.09 5.09 0 0 1-.834-.065 4.42 4.42 0 0 1-.799-.2 3.655 3.655 0 0 1-.732-.34 3.896 3.896 0 0 1-.632-.464 4.093 4.093 0 0 1-.544-.606 4.276 4.276 0 0 1-.418-.718 4.606 4.606 0 0 1-.267-.804 5.08 5.08 0 0 1-.093-.859c0-.292.031-.58.093-.859.062-.279.152-.549.267-.804.116-.256.256-.496.418-.718a3.896 3.896 0 0 1 .544-.606c.2-.182.412-.337.632-.464a3.655 3.655 0 0 1 .732-.34 4.42 4.42 0 0 1 .799-.2c.275-.043.553-.065.834-.065.281 0 .56.022.834.065.275.042.543.11.799.2.255.09.502.204.732.34.22.127.432.282.632.464.2.181.383.385.544.606.162.222.302.462.418.718.115.255.205.525.267.804.062.278.093.567.093.859 0 .292-.031.58-.093.859a4.276 4.276 0 0 1-.267.804c-.116.256-.256.496-.418.718a3.896 3.896 0 0 1-.544.606 3.655 3.655 0 0 1-.632.464c-.23.136-.477.25-.732.34a4.42 4.42 0 0 1-.799.2 5.09 5.09 0 0 1-.834.065z"/></svg>
                                <span style="font-weight: 600; color: var(--text-main); font-size: 0.95rem;">{{ $latestCv->file_path ? basename($latestCv->file_path) : 'Curriculum_Vitae.pdf' }}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span style="font-size: 0.8rem; color: var(--text-muted);">Diunggah pada: {{ $latestCv->created_at->format('d/m/Y H:i') }}</span>
                                <a href="{{ route('user.cv.show', $latestCv->id) }}" class="premium-btn-outline" style="padding: 4px 12px; font-size: 0.85rem; border-color: var(--accent-color); color: var(--accent-color);">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rekomendasi Lowongan (Recent Jobs) -->
                <h4 style="font-weight: 700; color: var(--text-main); margin-bottom: 20px; font-size: 1.25rem;">Rekomendasi Lowongan</h4>
                
                @if($jobs->count() > 0)
                    <div class="row g-3">
                        @foreach($jobs as $job)
                            <div class="col-md-6">
                                <div class="premium-card h-100 p-4" style="transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.06)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.04)';">
                                    <div class="d-flex align-items-center mb-3">
                                        <div style="width: 48px; height: 48px; background: #fff; border: 1px solid var(--card-border); border-radius: 12px; display:flex; align-items:center; justify-content:center; margin-right: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.02);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="var(--warning-color)" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                              <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                                              <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 style="font-weight: 700; color: var(--text-main); margin: 0; font-size: 1.1rem; line-height: 1.2;">{{ $job->posisi }}</h5>
                                            <p style="color: var(--text-muted); font-size: 0.85rem; margin-top: 4px; margin-bottom: 0;">{{ $job->company->nama_perusahaan ?? 'Perusahaan Rahasia' }}</p>
                                        </div>
                                    </div>
                                    <div style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 12px; height: 40px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                        {{ Str::limit(strip_tags($job->deskripsi), 80) }}
                                    </div>
                                    
                                    @if($job->kontak_email || $job->kontak_telepon)
                                    <div style="margin-bottom: 16px; font-size: 0.85rem; color: var(--text-main); background: #f8fafc; padding: 10px; border-radius: 8px; border: 1px solid #e2e8f0;">
                                        <div style="font-weight: 700; margin-bottom: 6px; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Hubungi Rekruter:</div>
                                        @if($job->kontak_email)
                                            <div class="mb-1"><i class="bi bi-envelope-fill me-2" style="color: var(--accent-color);"></i> <a href="mailto:{{ $job->kontak_email }}" style="color: var(--text-main); text-decoration: none;">{{ $job->kontak_email }}</a></div>
                                        @endif
                                        @if($job->kontak_telepon)
                                            <div><i class="bi bi-whatsapp me-2" style="color: var(--success-color);"></i> <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $job->kontak_telepon) }}" target="_blank" style="color: var(--text-main); text-decoration: none;">{{ $job->kontak_telepon }}</a></div>
                                        @endif
                                    </div>
                                    @endif

                                    <div class="d-flex justify-content-between align-items-center pt-3" style="border-top: 1px solid var(--primary-bg);">
                                        <span class="badge" style="background: var(--primary-bg); color: var(--text-muted); border: 1px solid var(--card-border); font-weight: 500;">Baru Ditambahkan</span>
                                        <a href="{{ route('user.jobs.show', $job->id) }}" class="premium-btn text-decoration-none" style="padding: 6px 16px; font-size: 0.85rem;">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="premium-card text-center py-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#cbd5e1" class="bi bi-inbox mb-3" viewBox="0 0 16 16">
                          <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm-1.17-.437A1.5 1.5 0 0 1 4.98 3h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.311l-.04.422-.05.105c-.14.283-.43.5-.83.5H10.5a.5.5 0 0 0-.5.5.5.5 0 0 1-1 0 .5.5 0 0 0-.5-.5H1.67c-.4 0-.69-.217-.83-.5l-.05-.105-.04-.422a.5.5 0 0 1 .105-.311l3.7-4.625z"/>
                        </svg>
                        <p style="color: var(--text-muted); font-size: 0.95rem; margin:0;">Belum ada lowongan tersedia saat ini.</p>
                    </div>
                @endif
            </div>

            <!-- Right Column: Profile Info -->
            <div class="col-lg-4">
                <div class="premium-card p-4 text-center sticky-top" style="top: 20px;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--accent-light) 0%, #e0f2fe 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; border: 4px solid #fff; box-shadow: 0 4px 15px rgba(14, 165, 233, 0.15);">
                        <span style="font-weight: 800; font-size: 2rem; color: var(--accent-color);">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    </div>
                    <h5 style="font-weight: 800; color: var(--text-main); margin-bottom: 4px; font-size: 1.2rem;">{{ Auth::user()->name }}</h5>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 24px;">{{ Auth::user()->email }}</p>
                    
                    <div class="text-start" style="background: var(--primary-bg); border-radius: 12px; padding: 16px;">
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3" style="border-bottom: 1px dashed var(--card-border);">
                            <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Tipe Akun</span>
                            <span class="badge" style="background: #e2e8f0; color: #475569; font-weight: 700; border-radius: 6px;">PELAMAR</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Total Upload CV</span>
                            <span style="font-weight: 700; color: var(--text-main);">{{ $cvs->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
