<?php

namespace App\Services;

class CvAnalyzerService
{
    /**
     * Pura-pura mengirim CV ke API Xetel AI.
     * Nanti Yazid bisa mengganti isi fungsi ini dengan kode CURL / Http Client betulan ke API Xetel atau Gemini.
     */
    public function analyze(string $filePath): array
    {
        // TODO: Ekstrak teks dari PDF jika diperlukan (misal pakai spatie/pdf-to-text)
        
        // TODO: Kirim teks / file ke API Xetel AI dan tangkap response-nya.

        // MOCK / DUMMY RESPONSE
        // Kita pura-pura AI mengembalikan JSON berupa array daftar skill teknis yang ditemukan dari CV.
        return [
            'status' => 'success',
            'skills' => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'HTML', 'CSS', 'Git'],
            'experience_years' => 2
        ];
    }
}
