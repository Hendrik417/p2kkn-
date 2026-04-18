    <?php

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
    use App\Http\Controllers\Auth\RegisteredUserController;
    use App\Http\Controllers\KknScoreController;
    use App\Http\Controllers\ViewReportController;
    use Illuminate\Support\Facades\Route;


    Route::get('/', function () {
        return view('landing.layouts.app');
    });

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);


    Route::get('/lecturer/dashboard', [GroupsController::class, 'dashboard'])
    ->name('lecturer.dashboard');

    Route::get('/dosen/nilai', [KknScoreController::class, 'create']);
    Route::post('/dosen/nilai', [KknScoreController::class, 'store']);

    Route::middleware(['auth'])->group(function () {

    Route::get('viewreport', [ViewReportController::class, 'index'])
        ->name('view.report');

});

    // Route::get('/dashboard', function () {
    //     return view('layouts.app');
    // })->middleware(['auth', 'verified'])->name('dashboard');


    // Route::get('/peta', function () {
    // return view('layouts.peta-kkn'); // Gunakan titik jika di dalam folder
    // });


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::prefix('verification')->name('verification.')->group(function () {

        Route::get('/', [VerificationReportsController::class, 'index'])
            ->name('index');

            Route::post('/store', [VerificationReportsController::class, 'store'])
        ->name('store');

        Route::post('/approve/{id}', [VerificationReportsController::class, 'approve'])
            ->name('approve');

        Route::post('/reject/{id}', [VerificationReportsController::class, 'reject'])
            ->name('reject');
    });

    Route::middleware(['auth', 'verified'])->group(function () {


        Route::get('/dashboardstudent', [DashboardStudentController::class, 'index'])
            ->name('student.dashboard');

        Route::get('/dashboardlecturer', [DashboardLecturerController::class, 'index'])
            ->name('lecturer.dashboard');

        Route::get('/nilai', [VelueController::class, 'index'])
            ->name('nilai.index');

        Route::get('/pendaftaran', [RegistrationController::class, 'index'])
            ->name('student.pendaftaran');

        Route::post('/pendaftaran', [RegistrationController::class, 'store'])
            ->name('student.pendaftaran.store');

        // Resources & Profile
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
        // Route::resource('reports', ReportsController::class);
        Route::resource('reports', ReportsController::class)->except(['create', 'edit', 'update', 'show']);
        Route::resource('regency', RegencyController::class);


        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });

    require __DIR__.'/auth.php';
