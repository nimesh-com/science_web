<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Auth\Events\Verified;
use App\Http\Controllers\admin\StudentController;

Route::get('/', function () {
    return view('welcome');
});

/*  Route::get('/dashboard', function () {
    return view('admin.master');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

Route::prefix('admin', ['middleware' => ['auth', 'verified', 'role:admin']])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDB'])->name('admin');

    /* Student Routes */
    Route::resource('students', StudentController::class);
    Route::post('students/{student}/toggle-status', [StudentController::class, 'toggleStatus'])->name('students.toggleStatus');

    /* End of Student Routes */

    /* Online Class */
    Route::resource('classes', 'App\Http\Controllers\admin\OnClassController');
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
