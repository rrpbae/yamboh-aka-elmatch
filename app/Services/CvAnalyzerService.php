<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Smalot\PdfParser\Parser;
use Exception;

class CvAnalyzerService
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        // Mengambil API Key dari .env
        $this->apiKey = env('GEMINI_API_KEY');
        // Menggunakan model Gemini 1.5 Flash (Gratis, cepat, dan jago membaca teks)
        $this->apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-lite-latest:generateContent";
    }

    public function analyze($filePath)
    {
        try {
            // 1. Ekstrak teks dari file PDF
            $parser = new Parser();
            $pdf = $parser->parseFile($filePath);
            $cvText = $pdf->getText();

            // Batasi panjang teks jika terlalu panjang
            $cvText = substr($cvText, 0, 15000); 

            // Cek jika teks gagal diekstrak (contoh: PDF berupa gambar hasil scan)
            if (empty(trim($cvText))) {
                throw new Exception("Sistem tidak dapat membaca teks dari PDF ini. Pastikan PDF yang diunggah berisi teks yang bisa diblok/copy (bukan gambar scan/foto).");
            }

            // 2. Rancang Prompt Engineering agar Gemini merespons dalam format JSON murni
            // (Ditambahkan 'experience_years' agar tampilan UI yang sudah kita buat tidak rusak)
            $prompt = "Anda adalah seorang HRD profesional dan CV reviewer ahli. 
            Tolong analisis teks CV berikut ini. 
            Ekstrak daftar hard skills/soft skills yang dimiliki ke dalam array, estimasi lama pengalaman, serta berikan poin-poin rekomendasi perbaikan yang konkret untuk CV tersebut.

            PENTING: Anda HARUS merespons HANYA dalam format JSON murni yang valid tanpa format markdown (jangan gunakan ```json ... ```). 
            Struktur JSON harus seperti ini:
            {
                \"skills\": [\"Skill1\", \"Skill2\", \"Skill3\"],
                \"experience_years\": 2,
                \"suggestions\": [\"Saran perbaikan 1\", \"Saran perbaikan 2\"]
            }

            Berikut adalah teks CV-nya:
            " . $cvText;

            // 3. Kirim HTTP Request ke API Gemini dengan Timeout 60 detik
            $response = Http::timeout(60)->withHeaders([
                'Content-Type' => 'application/json',
                'Connection' => 'close', // Mencegah server Windows (php artisan serve) hang/deadlock
            ])->post($this->apiUrl . "?key=" . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                // Pastikan format respons adalah JSON
                'generationConfig' => [
                    'responseMimeType' => 'application/json'
                ]
            ]);

            if ($response->failed()) {
                throw new Exception("Gemini API Error: " . $response->body());
            }

            // 4. Ambil teks respons dari Gemini
            $resultText = $response->json('candidates.0.content.parts.0.text');

            // Ekstrak hanya blok JSON menggunakan Regex (mencegah error jika AI menyelipkan teks tambahan)
            if (preg_match('/\{[\s\S]*\}/', $resultText, $matches)) {
                $cleanJson = trim($matches[0]);
            } else {
                $cleanJson = trim(str_replace(['```json', '```'], '', $resultText));
            }

            // 5. Decode string JSON menjadi array PHP
            $data = json_decode($cleanJson, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception("Gagal melakukan parse JSON hasil AI.");
            }

            return $data;

        } catch (Exception $e) {
            // Jika terjadi error, kembalikan struktur default agar aplikasi tidak langsung crash
            return [
                'skills' => [],
                'experience_years' => 0,
                'suggestions' => ['Gagal menganalisis CV secara otomatis: ' . $e->getMessage()]
            ];
        }
    }
}
