@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6 flex items-center">
        <a href="{{ route('company.dashboard') }}" class="text-gray-500 hover:text-blue-600 mr-3 transition"><i class="fas fa-arrow-left"></i></a>
        <h1 class="text-2xl font-bold text-gray-900">Tambah Lowongan Kerja</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 sm:p-8">
            <form action="{{ route('company.jobs.store') }}" method="POST">
                @csrf
                
                <div class="mb-5">
                    <label for="posisi" class="block text-sm font-medium text-gray-700 mb-1">Posisi / Jabatan <span class="text-red-500">*</span></label>
                    <input type="text" id="posisi" name="posisi" value="{{ old('posisi') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 border p-2.5" required placeholder="Contoh: Senior Laravel Developer">
                    @error('posisi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Pekerjaan <span class="text-red-500">*</span></label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 border p-2.5" required placeholder="Jelaskan tanggung jawab dan jobdesc dari posisi ini.">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-8">
                    <label for="kualifikasi" class="block text-sm font-medium text-gray-700 mb-1">Kualifikasi / Persyaratan <span class="text-red-500">*</span></label>
                    <p class="text-xs text-gray-500 mb-2">Tuliskan *skill* utama yang dibutuhkan (misal: PHP, Laravel, API). Sistem AI kami akan mencocokkan kata kunci ini dengan CV pelamar.</p>
                    <textarea id="kualifikasi" name="kualifikasi" rows="5" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 border p-2.5" required placeholder="1. Menguasai PHP 8&#10;2. Berpengalaman dengan Laravel 11&#10;3. Paham Git dan CI/CD">{{ old('kualifikasi') }}</textarea>
                    @error('kualifikasi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center justify-end border-t border-gray-100 pt-5 mt-5">
                    <a href="{{ route('company.dashboard') }}" class="text-gray-600 hover:text-gray-900 font-medium px-4 py-2 mr-2">Batal</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-lg transition duration-150">
                        Posting Lowongan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
