@extends('layouts.app')

@section('content')
<style>
    .stat-card {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        border: 1px solid transparent;
        position: relative;
        overflow: hidden;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.05) !important;
        border-color: var(--card-border);
    }
    .stat-card::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: radial-gradient(circle at top right, rgba(255,255,255,0.8), transparent);
        opacity: 0;
        transition: opacity 0.3s;
        pointer-events: none;
    }
    .stat-card:hover::after {
        opacity: 1;
    }
    .card-footer-link {
        display: block;
        padding: 12px;
        background: var(--primary-bg);
        color: var(--text-muted);
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 700;
        transition: all 0.2s;
        border-top: 1px solid var(--card-border);
    }
    .card-footer-link:hover {
        background: var(--accent-color);
        color: white !important;
    }
    
    .table-hover-custom {
        border-collapse: separate;
        border-spacing: 0 8px;
    }
    .table-hover-custom tbody tr {
        transition: all 0.2s ease;
        background: #fff;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }
    .table-hover-custom tbody tr:hover {
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-radius: 8px;
        position: relative;
        z-index: 2;
    }
    .table-hover-custom td {
        border-top: 1px solid var(--card-border);
        border-bottom: 1px solid var(--card-border);
    }
    .table-hover-custom td:first-child {
        border-left: 1px solid var(--card-border);
        border-top-left-radius: 12px;
        border-bottom-left-radius: 12px;
    }
    .table-hover-custom td:last-child {
        border-right: 1px solid var(--card-border);
        border-top-right-radius: 12px;
        border-bottom-right-radius: 12px;
    }
    
    .btn-action {
        opacity: 0;
        transform: translateX(-10px);
        transition: all 0.3s ease;
    }
    .table-hover-custom tbody tr:hover .btn-action {
        opacity: 1;
        transform: translateX(0);
    }
    
    .pulse-dot {
        height: 8px; width: 8px;
        background-color: var(--success-color);
        border-radius: 50%;
        display: inline-block;
        margin-right: 8px;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }
</style>

<div class="container mt-4 mb-5">
    <!-- Header Area -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-7">
            <h2 style="font-weight: 800; color: var(--text-main); margin-bottom: 5px; letter-spacing: -0.5px;">Dashboard Administrator</h2>
            <p style="color: var(--text-muted); font-size: 1.05rem; margin:0;">Ringkasan dan kendali utama platform ElMatch.</p>
        </div>
        <div class="col-md-5 text-md-end text-start mt-3 mt-md-0 d-flex justify-content-md-end align-items-center">
            <button class="btn btn-sm btn-outline-dark me-3 rounded-pill px-3 py-2" onclick="alert('Memproses file PDF Laporan... Tunggu sebentar.')">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-download me-2" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/></svg>
                Unduh Laporan
            </button>
            <span class="glass-badge px-3 py-2 shadow-sm" style="font-size: 0.85rem; display: inline-flex; align-items: center; border: 1px solid var(--card-border); border-radius: 50px;">
                <span class="pulse-dot"></span>
                Sistem Aktif
            </span>
        </div>
    </div>

    <!-- Statistik Utama -->
    <div class="row mb-5 g-4">
        <!-- Pencari Kerja -->
        <div class="col-md-3 col-sm-6">
            <div class="premium-card stat-card text-center h-100 d-flex flex-column" style="padding:0;">
                <div class="p-4 flex-grow-1">
                    <div style="background: var(--accent-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1) rotate(5deg)'" onmouseout="this.style.transform='scale(1) rotate(0)'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--accent-color)" class="bi bi-people-fill" viewBox="0 0 16 16">
                          <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>
                    </div>
                    <h3 style="font-weight: 800; color: var(--text-main); margin-bottom: 5px; font-size: 2.2rem;">{{ $stats['total_users'] }}</h3>
                    <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin: 0;">Pencari Kerja</p>
                </div>
                <a href="#" class="card-footer-link" onclick="alert('Fitur Manajemen Pengguna akan segera hadir!')">Kelola Pengguna &rarr;</a>
            </div>
        </div>
        
        <!-- Perusahaan -->
        <div class="col-md-3 col-sm-6">
            <div class="premium-card stat-card text-center h-100 d-flex flex-column" style="padding:0;">
                <div class="p-4 flex-grow-1">
                    <div style="background: var(--success-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1) rotate(5deg)'" onmouseout="this.style.transform='scale(1) rotate(0)'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--success-color)" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                          <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-8h1v1h-1zm0 2h1v1h-1zm0 2h1v1h-1z"/>
                        </svg>
                    </div>
                    <h3 style="font-weight: 800; color: var(--text-main); margin-bottom: 5px; font-size: 2.2rem;">{{ $stats['total_companies'] }}</h3>
                    <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin: 0;">Perusahaan</p>
                </div>
                <a href="#" class="card-footer-link" style="background: var(--success-light); color: var(--success-color); border-top-color: var(--success-light);" onmouseover="this.style.background='var(--success-color)'; this.style.color='#fff';" onmouseout="this.style.background='var(--success-light)'; this.style.color='var(--success-color)';">Verifikasi Mitra &rarr;</a>
            </div>
        </div>

        <!-- Lowongan -->
        <div class="col-md-3 col-sm-6">
            <div class="premium-card stat-card text-center h-100 d-flex flex-column" style="padding:0;">
                <div class="p-4 flex-grow-1">
                    <div style="background: var(--warning-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1) rotate(5deg)'" onmouseout="this.style.transform='scale(1) rotate(0)'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--warning-color)" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                          <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                          <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                        </svg>
                    </div>
                    <h3 style="font-weight: 800; color: var(--text-main); margin-bottom: 5px; font-size: 2.2rem;">{{ $stats['total_jobs'] }}</h3>
                    <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin: 0;">Lowongan Aktif</p>
                </div>
                <a href="#" class="card-footer-link" style="background: var(--warning-light); color: #b45309; border-top-color: var(--warning-light);" onmouseover="this.style.background='var(--warning-color)'; this.style.color='#fff';" onmouseout="this.style.background='var(--warning-light)'; this.style.color='#b45309';">Pantau Lowongan &rarr;</a>
            </div>
        </div>

        <!-- CV Dianalisis -->
        <div class="col-md-3 col-sm-6">
            <div class="premium-card stat-card text-center h-100 d-flex flex-column" style="padding:0;">
                <div class="p-4 flex-grow-1">
                    <div style="background: var(--danger-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1) rotate(-5deg)'" onmouseout="this.style.transform='scale(1) rotate(0)'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--danger-color)" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                          <path d="M5.523 12.424c.14-.082.293-.162.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572q-.131.054-.223.006c-.05-.026-.067-.08-.077-.116-.01-.037-.02-.12.015-.24.015-.05.045-.109.08-.168.08-.13.2-.28.38-.423zm.459-2.647c-.015.023-.03.048-.045.074-.038.067-.075.138-.112.212-.224.444-.45 1.082-.67 1.745-.024.072-.047.144-.07.215.35-.11.71-.23 1.08-.36.19-.06.38-.13.57-.2-.1-.31-.2-.61-.28-.9-.05-.18-.1-.36-.14-.54a59 59 0 0 1-.29-1.15zM7.5 10.3c.01-.03.03-.07.05-.11.05-.1.11-.22.18-.34a8 8 0 0 1 .44-.71c-.05.06-.1.12-.14.19a4 4 0 0 0-.27.53c-.06.13-.11.26-.16.39l-.1.29zM8 5.5a1 1 0 0 0-.5.5c0 .24.08.61.16 1 .08.38.19.82.32 1.34.22-.09.43-.19.64-.3.07-.04.15-.08.22-.12a.8.8 0 0 0 .28-.35c.04-.08.06-.18.06-.29 0-.25-.09-.54-.27-.72C8.75 6.06 8.46 5.5 8 5.5"/>
                          <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.603 12.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .471.242c.089.105.145.234.151.372a1.7 1.7 0 0 1-.01.597c-.033.228-.115.48-.21.758a17 17 0 0 1-.462 1.258c.376.541.815 1.05 1.3 1.5.498.468 1.06 1.028 1.625 1.46.335.257.653.47.92.61.27.142.5.25.688.33.19.083.35.195.45.348.102.158.15.35.12.56a.8.8 0 0 1-.166.425c-.14.168-.344.256-.563.266-.23.01-.52-.061-.856-.23A7.5 7.5 0 0 1 11.2 11.5c-.53-.418-1.15-1-1.74-1.63a18 18 0 0 1-2.27 1.15 14 14 0 0 1-2.02.664c-.45.097-.83.18-1.1.25-.26.07-.46.15-.56.24m.92-1.15c.34-.1.74-.2 1.18-.3.41-.09.83-.19 1.25-.3a16 16 0 0 0 1.7-1.07c-.47-.41-.95-.88-1.41-1.4-.41-.48-.8-1-1.15-1.54a17 17 0 0 0-1.05 2.1c-.2.43-.4.87-.55 1.32q-.1.3-.15.48c-.03.11-.05.19-.05.25-.01.07 0 .1.03.1.04 0 .1-.04.22-.1q.16-.07.38-.2M12.5 10c-.3-.08-.6-.2-1-.4a8 8 0 0 0-1.4-.6c.5-.4.9-.8 1.3-1.2.4-.4.8-.8 1-1.1.2-.2.3-.4.3-.6v-.1c0-.1 0-.1-.02-.1-.02 0-.05.02-.1.08-.06.07-.15.18-.28.34-.16.19-.36.44-.6.76-.23.3-.48.65-.77 1.03-.26.35-.55.72-.85 1.08.38.2.78.3 1.15.3.38 0 .68-.08.82-.2.1-.1.14-.2.13-.3m-3.9-6.4c-.1-.1-.3-.2-.5-.1-.2 0-.3.2-.4.4-.1.2-.1.5 0 .8.1.3.2.6.4.8.1-.1.2-.3.3-.6.1-.3.2-.6.2-.9z"/>
                        </svg>
                    </div>
                    <h3 style="font-weight: 800; color: var(--text-main); margin-bottom: 5px; font-size: 2.2rem;">{{ $stats['total_cvs'] }}</h3>
                    <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin: 0;">CV Dianalisis</p>
                </div>
                <a href="#" class="card-footer-link" style="background: var(--danger-light); color: var(--danger-color); border-top-color: var(--danger-light);" onmouseover="this.style.background='var(--danger-color)'; this.style.color='#fff';" onmouseout="this.style.background='var(--danger-light)'; this.style.color='var(--danger-color)';">Laporan Analisis &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Tabel Pengguna & Perusahaan -->
    <div class="row g-4">
        <!-- Pencari Kerja Terbaru -->
        <div class="col-lg-6">
            <div class="premium-card h-100 p-4 d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-2" style="border-bottom: 1px dashed var(--card-border);">
                    <h5 style="font-weight: 800; color: var(--text-main); margin: 0; font-size: 1.15rem;">Pencari Kerja Terbaru</h5>
                    <button class="btn btn-sm btn-light rounded-pill px-3" style="font-size: 0.8rem; font-weight: 600;" onclick="alert('Membuka daftar lengkap pencari kerja...')">Lihat Semua</button>
                </div>
                
                @if($recentUsers->count() > 0)
                    <div class="table-responsive flex-grow-1" style="overflow-x: visible;">
                        <table class="table table-borderless align-middle table-hover-custom w-100">
                            <thead>
                                <tr>
                                    <th class="px-3" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Informasi Pengguna</th>
                                    <th class="px-3 text-end" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentUsers as $user)
                                <tr>
                                    <td class="p-3">
                                        <div class="d-flex align-items-center">
                                            <div class="position-relative">
                                                <div style="width: 44px; height: 44px; border-radius: 50%; background: var(--accent-light); color: var(--accent-color); border: 2px solid #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.1rem; margin-right: 14px;">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </div>
                                                <span class="position-absolute bottom-0 end-0 rounded-circle" style="width:12px; height:12px; background:var(--success-color); border:2px solid #fff; right:12px!important;"></span>
                                            </div>
                                            <div>
                                                <div style="font-weight: 800; font-size: 0.95rem; color: var(--text-main);">{{ $user->name }}</div>
                                                <div style="font-size: 0.8rem; color: var(--text-muted); font-weight: 500;">Bergabung {{ $user->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3 text-end">
                                        <button class="btn btn-sm btn-outline-dark rounded-circle btn-action" style="width:34px; height:34px; padding:0; display:inline-flex; align-items:center; justify-content:center;" title="Kirim Email" onclick="alert('Membuka form email ke {{ $user->email }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16"><path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/></svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="var(--text-muted)" class="bi bi-inbox opacity-50 mb-3" viewBox="0 0 16 16">
                          <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm-1.17-.437A1.5 1.5 0 0 1 4.98 3h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.311l-.04.422-.05.105c-.14.283-.43.5-.83.5H10.5a.5.5 0 0 0-.5.5.5.5 0 0 1-1 0 .5.5 0 0 0-.5-.5H1.67c-.4 0-.69-.217-.83-.5l-.05-.105-.04-.422a.5.5 0 0 1 .105-.311l3.7-4.625z"/>
                        </svg>
                        <p class="text-muted mb-0" style="font-size: 0.95rem;">Belum ada data pencari kerja.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Perusahaan Terbaru -->
        <div class="col-lg-6">
            <div class="premium-card h-100 p-4 d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-2" style="border-bottom: 1px dashed var(--card-border);">
                    <h5 style="font-weight: 800; color: var(--text-main); margin: 0; font-size: 1.15rem;">Perusahaan Terbaru</h5>
                    <button class="btn btn-sm btn-light rounded-pill px-3" style="font-size: 0.8rem; font-weight: 600;" onclick="alert('Membuka direktori perusahaan...')">Lihat Semua</button>
                </div>
                
                @if($recentCompanies->count() > 0)
                    <div class="table-responsive flex-grow-1" style="overflow-x: visible;">
                        <table class="table table-borderless align-middle table-hover-custom w-100">
                            <thead>
                                <tr>
                                    <th class="px-3" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Nama Perusahaan</th>
                                    <th class="px-3 text-end" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentCompanies as $company)
                                <tr>
                                    <td class="p-3">
                                        <div class="d-flex align-items-center">
                                            <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--success-light); color: var(--success-color); border: 2px solid #fff; display: flex; align-items: center; justify-content: center; margin-right: 14px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                                  <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                                                  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div style="font-weight: 800; font-size: 0.95rem; color: var(--text-main);">{{ $company->nama_perusahaan }}</div>
                                                <div style="font-size: 0.8rem; color: var(--text-muted); font-weight: 500;">Mitra sejak {{ $company->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3 text-end">
                                        <button class="btn btn-sm btn-outline-success rounded-circle btn-action" style="width:34px; height:34px; padding:0; display:inline-flex; align-items:center; justify-content:center;" title="Lihat Detail Profil" onclick="alert('Membuka profil lengkap {{ $company->nama_perusahaan }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/></svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="var(--text-muted)" class="bi bi-inbox opacity-50 mb-3" viewBox="0 0 16 16">
                          <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm-1.17-.437A1.5 1.5 0 0 1 4.98 3h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.311l-.04.422-.05.105c-.14.283-.43.5-.83.5H10.5a.5.5 0 0 0-.5.5.5.5 0 0 1-1 0 .5.5 0 0 0-.5-.5H1.67c-.4 0-.69-.217-.83-.5l-.05-.105-.04-.422a.5.5 0 0 1 .105-.311l3.7-4.625z"/>
                        </svg>
                        <p class="text-muted mb-0" style="font-size: 0.95rem;">Belum ada perusahaan yang terdaftar.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
