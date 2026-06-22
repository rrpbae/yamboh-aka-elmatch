@extends('layouts.app')

@section('content')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.03);
    }
    .table-hover-custom tbody tr {
        transition: all 0.2s ease;
        background: #fff;
    }
    .table-hover-custom tbody tr:hover {
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-radius: 8px;
        position: relative;
        z-index: 2;
    }
    .btn-action-delete {
        opacity: 0.7;
        transition: all 0.3s ease;
    }
    .btn-action-delete:hover {
        opacity: 1;
        transform: scale(1.1);
    }
</style>

<div class="container mt-4 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 style="font-weight: 800; color: var(--text-main); margin-bottom: 5px; letter-spacing: -0.5px;">Laporan Analisis CV</h2>
            <p style="color: var(--text-muted); font-size: 1.05rem; margin:0;">Riwayat dokumen CV yang diunggah dan dianalisis sistem.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark rounded-pill px-4">Kembali ke Dashboard</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 rounded-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-card p-4">
        @if($cvs->count() > 0)
            <div class="table-responsive" style="overflow-x: visible;">
                <table class="table table-borderless align-middle table-hover-custom w-100">
                    <thead>
                        <tr>
                            <th class="px-3" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Pemilik CV</th>
                            <th class="px-3" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Dokumen</th>
                            <th class="px-3 text-center" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Status AI</th>
                            <th class="px-3" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Diunggah Pada</th>
                            <th class="px-3 text-end" style="color: var(--text-muted); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding-bottom: 10px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cvs as $cv)
                        <tr style="border-bottom: 1px solid var(--card-border);">
                            <td class="p-3">
                                <div class="d-flex align-items-center">
                                    <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--danger-light); color: var(--danger-color); border: 2px solid #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.1rem; margin-right: 14px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                          <path d="M5.523 12.424c.14-.082.293-.162.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572q-.131.054-.223.006c-.05-.026-.067-.08-.077-.116-.01-.037-.02-.12.015-.24.015-.05.045-.109.08-.168.08-.13.2-.28.38-.423zm.459-2.647c-.015.023-.03.048-.045.074-.038.067-.075.138-.112.212-.224.444-.45 1.082-.67 1.745-.024.072-.047.144-.07.215.35-.11.71-.23 1.08-.36.19-.06.38-.13.57-.2-.1-.31-.2-.61-.28-.9-.05-.18-.1-.36-.14-.54a59 59 0 0 1-.29-1.15zM7.5 10.3c.01-.03.03-.07.05-.11.05-.1.11-.22.18-.34a8 8 0 0 1 .44-.71c-.05.06-.1.12-.14.19a4 4 0 0 0-.27.53c-.06.13-.11.26-.16.39l-.1.29zM8 5.5a1 1 0 0 0-.5.5c0 .24.08.61.16 1 .08.38.19.82.32 1.34.22-.09.43-.19.64-.3.07-.04.15-.08.22-.12a.8.8 0 0 0 .28-.35c.04-.08.06-.18.06-.29 0-.25-.09-.54-.27-.72C8.75 6.06 8.46 5.5 8 5.5"/>
                                          <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.603 12.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .471.242c.089.105.145.234.151.372a1.7 1.7 0 0 1-.01.597c-.033.228-.115.48-.21.758a17 17 0 0 1-.462 1.258c.376.541.815 1.05 1.3 1.5.498.468 1.06 1.028 1.625 1.46.335.257.653.47.92.61.27.142.5.25.688.33.19.083.35.195.45.348.102.158.15.35.12.56a.8.8 0 0 1-.166.425c-.14.168-.344.256-.563.266-.23.01-.52-.061-.856-.23A7.5 7.5 0 0 1 11.2 11.5c-.53-.418-1.15-1-1.74-1.63a18 18 0 0 1-2.27 1.15 14 14 0 0 1-2.02.664c-.45.097-.83.18-1.1.25-.26.07-.46.15-.56.24m.92-1.15c.34-.1.74-.2 1.18-.3.41-.09.83-.19 1.25-.3a16 16 0 0 0 1.7-1.07c-.47-.41-.95-.88-1.41-1.4-.41-.48-.8-1-1.15-1.54a17 17 0 0 0-1.05 2.1c-.2.43-.4.87-.55 1.32q-.1.3-.15.48c-.03.11-.05.19-.05.25-.01.07 0 .1.03.1.04 0 .1-.04.22-.1q.16-.07.38-.2M12.5 10c-.3-.08-.6-.2-1-.4a8 8 0 0 0-1.4-.6c.5-.4.9-.8 1.3-1.2.4-.4.8-.8 1-1.1.2-.2.3-.4.3-.6v-.1c0-.1 0-.1-.02-.1-.02 0-.05.02-.1.08-.06.07-.15.18-.28.34-.16.19-.36.44-.6.76-.23.3-.48.65-.77 1.03-.26.35-.55.72-.85 1.08.38.2.78.3 1.15.3.38 0 .68-.08.82-.2.1-.1.14-.2.13-.3m-3.9-6.4c-.1-.1-.3-.2-.5-.1-.2 0-.3.2-.4.4-.1.2-.1.5 0 .8.1.3.2.6.4.8.1-.1.2-.3.3-.6.1-.3.2-.6.2-.9z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div style="font-weight: 800; font-size: 0.95rem; color: var(--text-main);">{{ $cv->user->name ?? 'Anonim' }}</div>
                                        <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $cv->user->email ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-3">
                                <a href="{{ asset('storage/' . $cv->file_path) }}" target="_blank" class="btn btn-sm btn-light rounded-pill px-3" style="font-size: 0.8rem; font-weight: 600;">Lihat File</a>
                            </td>
                            <td class="p-3 text-center">
                                @if($cv->hasil_ai)
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill border border-success border-opacity-25">Dianalisis AI</span>
                                @else
                                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill border border-warning border-opacity-25">Menunggu Analisis</span>
                                @endif
                            </td>
                            <td class="p-3" style="color: var(--text-muted); font-size: 0.9rem;">
                                {{ $cv->created_at->format('d M Y H:i') }}
                            </td>
                            <td class="p-3 text-end">
                                <form action="{{ route('admin.cvs.destroy', $cv->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data CV ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle btn-action-delete" style="width:34px; height:34px; padding:0; display:inline-flex; align-items:center; justify-content:center;" title="Hapus CV">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4 d-flex justify-content-center">
                {{ $cvs->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="text-center py-5">
                <p class="text-muted mb-0" style="font-size: 0.95rem;">Belum ada CV yang diunggah.</p>
            </div>
        @endif
    </div>
</div>
@endsection
