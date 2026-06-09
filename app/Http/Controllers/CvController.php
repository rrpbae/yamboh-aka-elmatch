<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cv;
use App\Models\JobVacancy;
use App\Models\Recommendation;
use App\Services\CvAnalyzerService;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    protected $aiService;

    public function __construct(CvAnalyzerService $aiService)
    {
        $this->aiService = $aiService;
    }

    public function index()
    {
        // Tampilkan halaman upload CV dan daftar rekomendasi milik user ini
        $cvs = auth()->user()->cvs()->latest()->get();
        return view('cv.index', compact('cvs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cv_file' => 'required|mimes:pdf|max:2048', // maksimal 2MB
        ]);

        // 1. Simpan File PDF
        $file = $request->file('cv_file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('cv_uploads', $fileName, 'public');

        // 2. Analisis CV menggunakan AI Service (Dummy saat ini)
        $aiResult = $this->aiService->analyze(storage_path('app/public/' . $filePath));

        // 3. Simpan data CV ke database
        $cv = Cv::create([
            'user_id' => auth()->id(),
            'file_path' => $filePath,
            'hasil_ai' => $aiResult,
        ]);

        // 4. Kalkulasi Pencocokan (Scoring) dengan Lowongan Kerja (Job Vacancies)
        $this->calculateRecommendations($cv, $aiResult['skills']);

        return redirect()->route('user.cv.index')->with('success', 'CV berhasil dianalisis! Lihat rekomendasi loker di bawah.');
    }

    private function calculateRecommendations(Cv $cv, array $userSkills)
    {
        // Ambil semua lowongan yang sedang buka
        $jobs = JobVacancy::where('status_open', true)->get();

        foreach ($jobs as $job) {
            // Asumsi: kolom kualifikasi berisi teks panjang. 
            // Kita pecah menjadi kata kunci untuk pencocokan sederhana (Keyword Matching).
            $kualifikasiTeks = strtolower($job->kualifikasi);
            
            $matchCount = 0;
            foreach ($userSkills as $skill) {
                if (str_contains($kualifikasiTeks, strtolower($skill))) {
                    $matchCount++;
                }
            }

            // Hitung skor sederhana (0 - 100)
            // Asumsi kasar: kita anggap 5 skill yang cocok = 100% (bisa disesuaikan algoritmanya nanti)
            $targetSkills = 5; 
            $score = ($matchCount / $targetSkills) * 100;
            if ($score > 100) {
                $score = 100;
            }

            // Simpan rekomendasi jika skor > 0 (artinya ada kecocokan minimal 1 skill)
            if ($score > 0) {
                Recommendation::create([
                    'cv_id' => $cv->id,
                    'job_vacancy_id' => $job->id,
                    'score' => $score
                ]);
            }
        }
    }

    public function show(Cv $cv)
    {
        // Pastikan hanya pemilik CV yang bisa melihat
        if ($cv->user_id !== auth()->id()) {
            abort(403);
        }

        $recommendations = $cv->recommendations()->with('jobVacancy.company')->orderByDesc('score')->get();
        return view('cv.show', compact('cv', 'recommendations'));
    }
}
