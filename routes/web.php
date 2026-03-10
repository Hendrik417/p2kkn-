<?php

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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('news',NewsController::class)->middleware('auth', 'verified');
    Route::resource('gallery',GalleryController::class)->middleware('auth', 'verified');
    Route::resource('infographis',InfographisController::class)->middleware('auth', 'verified');
    Route::resource('regency', RegencyController::class)->middleware('auth', 'verified');
    Route::resource('district', DistrictController::class)->middleware('auth', 'verified');
    Route::resource('village', VillageController::class)->middleware('auth', 'verified');
    Route::resource('lecturer', LecturerController::class)->middleware('auth', 'verified');
    Route::resource('student', StudentsController::class)->middleware('auth', 'verified');
    Route::resource('faqs', FaqsController::class)->middleware('auth', 'verified');
    Route::resource('periods', PeriodsController::class)->middleware('auth', 'verified');
    Route::resource('groups', GroupsController::class)->middleware('auth', 'verified');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
