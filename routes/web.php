<?php

use App\Http\Controllers\admin\OnClassController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\LMS\LMSController;
use App\Http\Controllers\admin\LessonsController;


Route::get('/', function () {
    return view('student.master');
});

 Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard'); 

/* Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard'); */

Route::prefix('admin', ['middleware' => ['auth', 'verified', 'role:admin']])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDB'])->name('admin');

    /* Student Routes */
    Route::resource('students', StudentController::class);
    Route::post('students/{student}/toggle-status', [StudentController::class, 'toggleStatus'])->name('students.toggleStatus');

    /* End of Student Routes */

    /* Online Class */
    Route::resource('classes', OnClassController::class);
    /* End of Online Class */

    /* Lecture Materials */
    Route::resource('lessons', LessonsController::class);
    /* End of Lecture Materials */
});


/* Student LMS */
Route::prefix('student')
    ->middleware(['auth', 'verified', 'role:student'])
    ->group(function () {
        Route::get('/LMS', [LMSController::class, 'index'])->name('LMS');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
