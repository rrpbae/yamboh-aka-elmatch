@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h2 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px;">Dashboard Administrator</h2>
            <p style="color: var(--text-muted); font-size: 1.05rem;">Ringkasan aktivitas platform ElMatch.</p>
        </div>
        <div class="col-md-6 text-md-end text-start mt-3 mt-md-0">
            <div class="mb-3">
                <span class="glass-badge px-4 py-2" style="font-size: 0.9rem; display: inline-flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history me-2" viewBox="0 0 16 16">
                      <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
                      <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                      <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                    </svg>
                    Data Real-time
                </span>
            </div>
            <div class="d-flex justify-content-md-end justify-content-start align-items-center flex-wrap gap-3">
                <a href="{{ route('admin.jobs.index') }}" class="premium-btn text-decoration-none" style="font-size: 0.9rem; padding: 8px 16px;">
                    <i class="bi bi-briefcase-fill me-1"></i> Manajemen Lowongan
                </a>
                <a href="{{ route('admin.users.index') }}" class="premium-btn text-decoration-none" style="font-size: 0.9rem; padding: 8px 16px;">
                    <i class="bi bi-people-fill me-1"></i> Manajemen Pengguna
                </a>
            </div>
        </div>
    </div>

    <!-- Statistik Utama -->
    <div class="row mb-5">
        <!-- Pencari Kerja -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="premium-card text-center h-100 p-4">
                <div style="background: var(--accent-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--accent-color)" class="bi bi-people-fill" viewBox="0 0 16 16">
                      <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>
                </div>
                <h3 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px; font-size: 2rem;">{{ $stats['total_users'] }}</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin: 0;">Pencari Kerja</p>
            </div>
        </div>
        
        <!-- Perusahaan -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="premium-card text-center h-100 p-4">
                <div style="background: var(--success-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--success-color)" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                      <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-8h1v1h-1zm0 2h1v1h-1zm0 2h1v1h-1z"/>
                    </svg>
                </div>
                <h3 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px; font-size: 2rem;">{{ $stats['total_companies'] }}</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin: 0;">Perusahaan</p>
            </div>
        </div>

        <!-- Lowongan -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="premium-card text-center h-100 p-4">
                <div style="background: var(--warning-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--warning-color)" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                      <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                      <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                    </svg>
                </div>
                <h3 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px; font-size: 2rem;">{{ $stats['total_jobs'] }}</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin: 0;">Lowongan</p>
            </div>
        </div>

        <!-- CV Dianalisis -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="premium-card text-center h-100 p-4">
                <div style="background: var(--danger-light); width: 64px; height: 64px; border-radius: 16px; display:flex; align-items:center; justify-content:center; margin: 0 auto 15px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--danger-color)" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                      <path d="M5.523 12.424c.14-.082.293-.162.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572q-.131.054-.223.006c-.05-.026-.067-.08-.077-.116-.01-.037-.02-.12.015-.24.015-.05.045-.109.08-.168.08-.13.2-.28.38-.423zm.459-2.647c-.015.023-.03.048-.045.074-.038.067-.075.138-.112.212-.224.444-.45 1.082-.67 1.745-.024.072-.047.144-.07.215.35-.11.71-.23 1.08-.36.19-.06.38-.13.57-.2-.1-.31-.2-.61-.28-.9-.05-.18-.1-.36-.14-.54a59 59 0 0 1-.29-1.15zM7.5 10.3c.01-.03.03-.07.05-.11.05-.1.11-.22.18-.34a8 8 0 0 1 .44-.71c-.05.06-.1.12-.14.19a4 4 0 0 0-.27.53c-.06.13-.11.26-.16.39l-.1.29zM8 5.5a1 1 0 0 0-.5.5c0 .24.08.61.16 1 .08.38.19.82.32 1.34.22-.09.43-.19.64-.3.07-.04.15-.08.22-.12a.8.8 0 0 0 .28-.35c.04-.08.06-.18.06-.29 0-.25-.09-.54-.27-.72C8.75 6.06 8.46 5.5 8 5.5"/>
                      <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.603 12.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .471.242c.089.105.145.234.151.372a1.7 1.7 0 0 1-.01.597c-.033.228-.115.48-.21.758a17 17 0 0 1-.462 1.258c.376.541.815 1.05 1.3 1.5.498.468 1.06 1.028 1.625 1.46.335.257.653.47.92.61.27.142.5.25.688.33.19.083.35.195.45.348.102.158.15.35.12.56a.8.8 0 0 1-.166.425c-.14.168-.344.256-.563.266-.23.01-.52-.061-.856-.23A7.5 7.5 0 0 1 11.2 11.5c-.53-.418-1.15-1-1.74-1.63a18 18 0 0 1-2.27 1.15 14 14 0 0 1-2.02.664c-.45.097-.83.18-1.1.25-.26.07-.46.15-.56.24m.92-1.15c.34-.1.74-.2 1.18-.3.41-.09.83-.19 1.25-.3a16 16 0 0 0 1.7-1.07c-.47-.41-.95-.88-1.41-1.4-.41-.48-.8-1-1.15-1.54a17 17 0 0 0-1.05 2.1c-.2.43-.4.87-.55 1.32q-.1.3-.15.48c-.03.11-.05.19-.05.25-.01.07 0 .1.03.1.04 0 .1-.04.22-.1q.16-.07.38-.2M12.5 10c-.3-.08-.6-.2-1-.4a8 8 0 0 0-1.4-.6c.5-.4.9-.8 1.3-1.2.4-.4.8-.8 1-1.1.2-.2.3-.4.3-.6v-.1c0-.1 0-.1-.02-.1-.02 0-.05.02-.1.08-.06.07-.15.18-.28.34-.16.19-.36.44-.6.76-.23.3-.48.65-.77 1.03-.26.35-.55.72-.85 1.08.38.2.78.3 1.15.3.38 0 .68-.08.82-.2.1-.1.14-.2.13-.3m-3.9-6.4c-.1-.1-.3-.2-.5-.1-.2 0-.3.2-.4.4-.1.2-.1.5 0 .8.1.3.2.6.4.8.1-.1.2-.3.3-.6.1-.3.2-.6.2-.9z"/>
                    </svg>
                </div>
                <h3 style="font-weight: 700; color: var(--text-main); margin-bottom: 5px; font-size: 2rem;">{{ $stats['total_cvs'] }}</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin: 0;">CV Dianalisis</p>
            </div>
        </div>
    </div>

    <!-- Tabel Pengguna & Perusahaan -->
    <div class="row">
        <!-- Pencari Kerja Terbaru -->
        <div class="col-md-6 mb-4">
            <div class="premium-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 style="font-weight: 700; color: var(--text-main); margin: 0; font-size: 1.1rem;">Pencari Kerja Terbaru</h5>
                </div>
                
                @if($recentUsers->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle" style="color: var(--text-main);">
                            <thead style="border-bottom: 2px solid var(--primary-bg);">
                                <tr>
                                    <th class="py-3 px-2" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Nama Pengguna</th>
                                    <th class="py-3 px-2 text-end" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Bergabung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentUsers as $user)
                                <tr style="border-bottom: 1px solid var(--primary-bg);">
                                    <td class="py-3 px-2">
                                        <div class="d-flex align-items-center">
                                            <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--accent-light); color: var(--accent-color); border: 1px solid var(--card-border); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1rem; margin-right: 16px;">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div style="font-weight: 700; font-size: 0.95rem;">{{ $user->name }}</div>
                                                <div style="font-size: 0.85rem; color: var(--text-muted);">{{ $user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-2 text-end align-middle" style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">
                                        {{ $user->created_at->diffForHumans() }}
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
        <div class="col-md-6 mb-4">
            <div class="premium-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 style="font-weight: 700; color: var(--text-main); margin: 0; font-size: 1.1rem;">Perusahaan Terbaru</h5>
                </div>
                
                @if($recentCompanies->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle" style="color: var(--text-main);">
                            <thead style="border-bottom: 2px solid var(--primary-bg);">
                                <tr>
                                    <th class="py-3 px-2" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Nama Perusahaan</th>
                                    <th class="py-3 px-2 text-end" style="color: var(--text-muted); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Bergabung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentCompanies as $company)
                                <tr style="border-bottom: 1px solid var(--primary-bg);">
                                    <td class="py-3 px-2">
                                        <div class="d-flex align-items-center">
                                            <div style="width: 40px; height: 40px; border-radius: 10px; background: var(--success-light); color: var(--success-color); border: 1px solid var(--card-border); display: flex; align-items: center; justify-content: center; margin-right: 16px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                                  <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                                                  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div style="font-weight: 700; font-size: 0.95rem;">{{ $company->nama_perusahaan }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-2 text-end align-middle" style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">
                                        {{ $company->created_at->diffForHumans() }}
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
