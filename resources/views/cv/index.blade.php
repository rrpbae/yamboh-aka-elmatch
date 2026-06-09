@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            @if(session('success'))
                <div class="alert alert-success premium-card mb-4" style="border-left: 5px solid #05cd99; padding: 15px 20px; border-radius: 12px; background: rgba(5, 205, 153, 0.1);">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Upload Area -->
            <div class="premium-card mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 style="font-weight: 700; color: var(--text-main); margin:0;">Unggah CV Anda</h3>
                    <span class="glass-badge">Format PDF</span>
                </div>
                
                <form action="{{ route('user.cv.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="file-upload-wrapper position-relative" onclick="document.getElementById('cv_file').click()">
                        <input type="file" name="cv_file" id="cv_file" class="d-none" accept=".pdf" onchange="document.getElementById('fileName').innerText = this.files[0].name">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="var(--accent-color)" class="bi bi-cloud-arrow-up mb-3 opacity-75" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708z"/>
                            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                        </svg>
                        <h5 style="color: var(--text-main); font-weight: 600;">Klik atau Tarik File CV Anda ke Sini</h5>
                        <p style="color: var(--text-muted); margin-bottom: 0;" id="fileName">Maksimal ukuran file: 2MB</p>
                    </div>

                    @error('cv_file')
                        <div class="text-danger mt-2" style="font-size: 0.9rem;">{{ $message }}</div>
                    @enderror

                    <div class="text-end mt-4">
                        <button type="submit" class="premium-btn">
                            Mulai Analisis AI ✨
                        </button>
                    </div>
                </form>
            </div>

            <!-- CV History -->
            <h4 class="mb-4" style="font-weight: 700; color: var(--text-main);">Riwayat Analisis CV</h4>
            
            @if($cvs->count() > 0)
                <div class="row">
                    @foreach($cvs as $cv)
                        <div class="col-md-6 mb-4">
                            <div class="premium-card">
                                <div class="d-flex align-items-center mb-3">
                                    <div style="background: rgba(67, 24, 255, 0.1); width: 50px; height: 50px; border-radius: 12px; display:flex; align-items:center; justify-content:center; margin-right: 15px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="var(--accent-color)" class="bi bi-file-pdf" viewBox="0 0 16 16">
                                            <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
                                            <path d="M4.603 12.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .471.242c.089.105.145.234.151.372a1.7 1.7 0 0 1-.01.597c-.033.228-.115.48-.21.758a17 17 0 0 1-.462 1.258c.376.541.815 1.05 1.3 1.5.498.468 1.06 1.028 1.625 1.46.335.257.653.47.92.61.27.142.5.25.688.33.19.083.35.195.45.348.102.158.15.35.12.56a.8.8 0 0 1-.166.425c-.14.168-.344.256-.563.266-.23.01-.52-.061-.856-.23A7.5 7.5 0 0 1 11.2 11.5c-.53-.418-1.15-1-1.74-1.63a18 18 0 0 1-2.27 1.15 14 14 0 0 1-2.02.664c-.45.097-.83.18-1.1.25-.26.07-.46.15-.56.24m.92-1.15c.34-.1.74-.2 1.18-.3.41-.09.83-.19 1.25-.3a16 16 0 0 0 1.7-1.07c-.47-.41-.95-.88-1.41-1.4-.41-.48-.8-1-1.15-1.54a17 17 0 0 0-1.05 2.1c-.2.43-.4.87-.55 1.32q-.1.3-.15.48c-.03.11-.05.19-.05.25-.01.07 0 .1.03.1.04 0 .1-.04.22-.1q.16-.07.38-.2M12.5 10c-.3-.08-.6-.2-1-.4a8 8 0 0 0-1.4-.6c.5-.4.9-.8 1.3-1.2.4-.4.8-.8 1-1.1.2-.2.3-.4.3-.6v-.1c0-.1 0-.1-.02-.1-.02 0-.05.02-.1.08-.06.07-.15.18-.28.34-.16.19-.36.44-.6.76-.23.3-.48.65-.77 1.03-.26.35-.55.72-.85 1.08.38.2.78.3 1.15.3.38 0 .68-.08.82-.2.1-.1.14-.2.13-.3m-3.9-6.4c-.1-.1-.3-.2-.5-.1-.2 0-.3.2-.4.4-.1.2-.1.5 0 .8.1.3.2.6.4.8.1-.1.2-.3.3-.6.1-.3.2-.6.2-.9z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h6 style="font-weight: 700; margin: 0;">{{ Str::limit(str_replace('cv_uploads/', '', $cv->file_path), 20) }}</h6>
                                        <small style="color: var(--text-muted);">Diunggah: {{ $cv->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                                
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    @if(isset($cv->hasil_ai['skills']) && is_array($cv->hasil_ai['skills']))
                                        @foreach(array_slice($cv->hasil_ai['skills'], 0, 3) as $skill)
                                            <span class="glass-badge" style="font-size: 0.75rem;">{{ $skill }}</span>
                                        @endforeach
                                        @if(count($cv->hasil_ai['skills']) > 3)
                                            <span class="glass-badge" style="font-size: 0.75rem; background: rgba(163, 174, 209, 0.2); color: var(--text-muted);">+{{ count($cv->hasil_ai['skills']) - 3 }} lainnya</span>
                                        @endif
                                    @endif
                                </div>

                                <a href="{{ route('user.cv.show', $cv->id) }}" class="btn btn-outline-primary w-100" style="border-radius: 10px; font-weight: 600;">Lihat Rekomendasi Loker &rarr;</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center p-5" style="border: 2px dashed rgba(163, 174, 209, 0.5); border-radius: 20px;">
                    <p style="color: var(--text-muted); margin: 0;">Belum ada CV yang diunggah.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
