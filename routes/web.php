<?php

use App\Http\Controllers\admin\OnClassController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\LMS\LMSController;
use App\Http\Controllers\admin\LessonsController;
use App\Http\Controllers\admin\ModuleController;
use App\Http\Controllers\admin\CourseController;

Route::get('/',[DashboardController::class, 'index'])->name('home');

/* Pages */
Route::get('/about', function () {
    return view('student/about');
});

Route::get('/contact', function () {
    return view('student/contact');
});

Route::get('/team', function () {
    return view('student/team');
});

Route::get('/courses', function () {
    return view('student/course');
});

Route::get('/lms', function () {
    return view('student/LMS/live');
});




Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('admin')
    ->middleware(['auth', 'verified', 'role:admin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'adminDB'])
            ->name('admin');

        /* Student Routes */
        Route::resource('students', StudentController::class);
        Route::post('students/{student}/toggle-status', [StudentController::class, 'toggleStatus'])
            ->name('students.toggleStatus');

        /* Online Class */
        Route::resource('classes', OnClassController::class);

        /* Lecture Materials */
        Route::resource('lessons', LessonsController::class);

        /* Module */
        Route::resource('modules', ModuleController::class);

        /* Course */
        Route::resource('courses', CourseController::class);

});



/* Student LMS */
Route::prefix('student')
    ->middleware(['auth', 'verified', 'role:student'])
    ->group(function () {
        Route::get('/LMS', [LMSController::class, 'index'])->name('LMS');

        Route::get('/live',[LMSController::class, 'LiveSession'])->name('student.lms.classroom');
        Route::get('/recorded',[LMSController::class, 'RecordedSessions'])->name('student.lms.recorded');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
