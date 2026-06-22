@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <div class="row">
        <!-- Form Upload Column -->
        <div class="col-md-5 mb-4">
            <div class="premium-card">
                <h4 style="font-weight: 700; color: var(--text-main); margin-bottom: 24px; font-size: 1.25rem;">Unggah Dokumen CV</h4>
                
                @if(session('success'))
                    <div class="alert alert-success mb-4 border-0" style="background-color: var(--success-light); color: var(--success-color); border-radius: 12px;">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger mb-4 border-0" style="background-color: var(--danger-light); color: var(--danger-color); border-radius: 12px;">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="alert mb-4 border-0" style="background-color: #fffbeb; color: #b45309; border-radius: 12px; font-size: 0.9rem; border: 1px solid #fde68a !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                    <div class="d-flex align-items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle-fill me-3 mt-1 flex-shrink-0" viewBox="0 0 16 16">
                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div style="line-height: 1.5;">
                            <strong style="display: block; margin-bottom: 4px;">Penting: Syarat Format CV</strong>
                            Agar AI dapat bekerja maksimal, unggah <b>PDF berformat teks</b> (hasil export dari Word/Canva). <br><u>Jangan</u> unggah foto, gambar jpeg, atau hasil scan yang dijadikan PDF (PDF Bergambar) karena AI tidak dapat membaca teks di dalamnya.
                        </div>
                    </div>
                </div>

                <form action="{{ route('user.cv.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="cv_file" class="file-upload-wrapper w-100 d-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="var(--accent-color)" class="bi bi-cloud-arrow-up mb-3" viewBox="0 0 16 16" style="margin: 0 auto;">
                              <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                              <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                            </svg>
                            <span style="display: block; font-weight: 600; color: var(--text-main); margin-bottom: 8px;">Pilih File PDF</span>
                            <span style="display: block; font-size: 0.85rem; color: var(--text-muted);">Maksimal ukuran file: 2MB</span>
                        </label>
                        <input type="file" class="form-control d-none @error('cv_file') is-invalid @enderror" id="cv_file" name="cv_file" accept=".pdf" required onchange="document.getElementById('file-name').innerText = this.files[0] ? this.files[0].name : ''">
                        <div id="file-name" class="mt-3 text-center" style="font-size: 0.9rem; font-weight: 600; color: var(--text-main);"></div>
                        @error('cv_file')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="premium-btn w-100 py-3 text-uppercase" style="letter-spacing: 0.5px;">Unggah dan Analisis</button>
                </form>
            </div>
        </div>

        <!-- History Column -->
        <div class="col-md-7">
            <div class="premium-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 style="font-weight: 700; color: var(--text-main); margin: 0; font-size: 1.25rem;">Riwayat Analisis CV</h4>
                    <span class="glass-badge">{{ $cvs->count() }} Dokumen</span>
                </div>

                @if($cvs->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle">
                            <tbody>
                                @foreach($cvs as $cv)
                                    <tr>
                                        <td class="py-4 px-0">
                                            <div class="d-flex align-items-start">
                                                <div style="background: var(--accent-light); padding: 14px; border-radius: 12px; margin-right: 16px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="var(--accent-color)" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                                      <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                                                      <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1m-4 11V2h3v2.5A1.5 1.5 0 0 0 10 6h2v7H4z"/>
                                                    </svg>
                                                </div>
                                                <div class="w-100">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h6 style="font-weight: 700; color: var(--text-main); margin: 0; font-size: 1rem;">
                                                            Dokumen Analisis #{{ $cv->id }}
                                                        </h6>
                                                        <span style="font-size: 0.8rem; color: var(--text-muted); font-weight: 500;">
                                                            {{ $cv->created_at->format('d M Y, H:i') }}
                                                        </span>
                                                    </div>
                                                    
                                                    @php
                                                        $hasilAi = is_string($cv->hasil_ai) ? json_decode($cv->hasil_ai, true) : $cv->hasil_ai;
                                                    @endphp
                                                    
                                                    <div class="mb-3">
                                                        @if(isset($hasilAi['skills']) && is_array($hasilAi['skills']))
                                                            @foreach(array_slice($hasilAi['skills'], 0, 4) as $skill)
                                                                <span class="glass-badge me-1 mb-1 d-inline-block" style="font-size: 0.75rem;">{{ $skill }}</span>
                                                            @endforeach
                                                            @if(count($hasilAi['skills']) > 4)
                                                                <span class="text-muted" style="font-size: 0.8rem; font-weight: 500;">+{{ count($hasilAi['skills']) - 4 }} lainnya</span>
                                                            @endif
                                                        @else
                                                            <span class="text-muted" style="font-size: 0.85rem;">Mengekstrak informasi keahlian...</span>
                                                        @endif
                                                    </div>

                                                    <a href="{{ route('user.cv.show', $cv->id) }}" class="premium-btn-outline text-decoration-none d-inline-block" style="padding: 6px 16px; font-size: 0.85rem;">
                                                        Lihat Rekomendasi
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="var(--text-muted)" class="bi bi-inbox mb-3 opacity-50" viewBox="0 0 16 16">
                          <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm-1.17-.437A1.5 1.5 0 0 1 4.98 3h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.311l-.04.422-.05.105c-.14.283-.43.5-.83.5H10.5a.5.5 0 0 0-.5.5.5.5 0 0 1-1 0 .5.5 0 0 0-.5-.5H1.67c-.4 0-.69-.217-.83-.5l-.05-.105-.04-.422a.5.5 0 0 1 .105-.311l3.7-4.625z"/>
                        </svg>
                        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 0;">Belum ada riwayat dokumen.<br>Unggah CV-mu sekarang!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
