<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
    Route::delete('/users/{user}', [App\Http\Controllers\AdminController::class, 'destroyUser'])->name('users.destroy');
    Route::get('/companies', [App\Http\Controllers\AdminController::class, 'companies'])->name('companies');
    Route::delete('/companies/{company}', [App\Http\Controllers\AdminController::class, 'destroyCompany'])->name('companies.destroy');
    Route::get('/jobs', [App\Http\Controllers\AdminController::class, 'jobs'])->name('jobs');
    Route::delete('/jobs/{job}', [App\Http\Controllers\AdminController::class, 'destroyJob'])->name('jobs.destroy');
    Route::get('/cvs', [App\Http\Controllers\AdminController::class, 'cvs'])->name('cvs');
    Route::delete('/cvs/{cv}', [App\Http\Controllers\AdminController::class, 'destroyCv'])->name('cvs.destroy');
    Route::get('/report/download', [App\Http\Controllers\AdminController::class, 'downloadReport'])->name('report.download');
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
