<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'role:company'])->prefix('company')->name('company.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\CompanyController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile/create', [App\Http\Controllers\CompanyController::class, 'createProfile'])->name('profile.create');
    Route::post('/profile/store', [App\Http\Controllers\CompanyController::class, 'storeProfile'])->name('profile.store');
    
    // CRUD Loker (Job Vacancies)
    Route::get('/jobs/create', [App\Http\Controllers\JobVacancyController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [App\Http\Controllers\JobVacancyController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}/edit', [App\Http\Controllers\JobVacancyController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [App\Http\Controllers\JobVacancyController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [App\Http\Controllers\JobVacancyController::class, 'destroy'])->name('jobs.destroy');
});

Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', function () { return view('user.dashboard'); })->name('dashboard');
    Route::get('/cv', [App\Http\Controllers\CvController::class, 'index'])->name('cv.index');
    Route::post('/cv', [App\Http\Controllers\CvController::class, 'store'])->name('cv.store');
    Route::get('/cv/{cv}', [App\Http\Controllers\CvController::class, 'show'])->name('cv.show');
});
