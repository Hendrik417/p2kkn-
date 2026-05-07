<?php

use Illuminate\Support\Facades\Route;

// Controllers
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardStudentController;
use App\Http\Controllers\DashboardLecturerController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VelueController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InfographisController;
use App\Http\Controllers\RegencyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\PeriodsController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\VerificationReportsController;
use App\Http\Controllers\KknScoreController;
use App\Http\Controllers\ViewReportController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing.layouts.app');
});

// Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);


/*
|--------------------------------------------------------------------------
| DASHBOARD REDIRECT (🔥 FIX UTAMA)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function (Request $request) {
    $user = $request->user();

    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    if ($user->role === 'dosen') {
        // Harus diarahkan ke URL lengkap: /dosen/dashboardlecturer
        return redirect('/dosen/dashboardlecturer');
    }

    if ($user->role === 'mahasiswa') {
        return redirect('/dashboardstudent');
    }

    return abort(403);
})->middleware('auth')->name('dashboard');
/*
|--------------------------------------------------------------------------
| Route Khusus Login
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/viewreport', [ViewReportController::class, 'index'])->name('view.report');
});


/*
|--------------------------------------------------------------------------
| VERIFIKASI LAPORAN (ADMIN / DOSEN)
|--------------------------------------------------------------------------
*/

Route::prefix('verification')->middleware(['auth', 'verified'])->name('verification.')->group(function () {
    Route::get('/', [VerificationReportsController::class, 'index'])->name('index');
    Route::post('/store', [VerificationReportsController::class, 'store'])->name('store');
    Route::post('/approve/{id}', [VerificationReportsController::class, 'approve'])->name('approve');
    Route::post('/reject/{id}', [VerificationReportsController::class, 'reject'])->name('reject');
});


/*
|--------------------------------------------------------------------------
| DOSEN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'role:dosen'])
    ->prefix('dosen')
    ->name('dosen.') // Prefix nama untuk semua route di dalam grup ini
    ->group(function () {

        // URL asli: /dosen/dashboardlecturer
        // Nama route: dosen.dashboard
        Route::get('/dashboardlecturer', [DashboardLecturerController::class, 'index'])
            ->name('dashboard');

        Route::get('/nilai', [KknScoreController::class, 'create'])->name('nilai.create');
        Route::post('/nilai', [KknScoreController::class, 'store'])->name('nilai.store');
});


/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| MAHASISWA (FIX FINAL)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'role:mahasiswa'])
    ->name('student.') // Ini akan memberikan awalan "student."
    ->group(function () {

        // Cukup tulis 'dashboard', nanti otomatis jadi 'student.dashboard'
        Route::get('/dashboardstudent', [DashboardStudentController::class, 'index'])
            ->name('dashboard');

        Route::get('/nilai', [VelueController::class, 'index'])
            ->name('nilai.index');

        // Cukup tulis 'pendaftaran', nanti otomatis jadi 'student.pendaftaran'
        Route::get('/pendaftaran', [RegistrationController::class, 'index'])
            ->name('pendaftaran');

        Route::post('/pendaftaran', [RegistrationController::class, 'store'])
            ->name('pendaftaran.store');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('news', NewsController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('infographis', InfographisController::class);
        Route::resource('regency', RegencyController::class);
        Route::resource('district', DistrictController::class);
        Route::resource('village', VillageController::class);
        Route::resource('lecturer', LecturerController::class);
        Route::resource('student', StudentsController::class);
        Route::resource('faqs', FaqsController::class);
        Route::resource('periods', PeriodsController::class);
        Route::resource('groups', GroupsController::class);

        Route::resource('reports', ReportsController::class)
            ->except(['create', 'edit', 'update', 'show']);
});


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
