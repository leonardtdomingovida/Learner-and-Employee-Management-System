<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailLogController;
use App\Providers\RouteServiceProvider;
use App\Mail\WelcomeMail;
use App\Models\User;

// 🌐 Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 🔒 Role-based Dashboard Redirection
Route::get('/redirect-dashboard', function () {
    $role = auth()->user()->role->name;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'employee' => redirect()->route('employee.dashboard'),
        'learner' => redirect()->route('learner.dashboard'),
        default => abort(403)
    };
})->middleware(['auth', 'verified'])->name('redirect.dashboard');

// 🛠 Profile Routes (from Breeze)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/admin/dashboard', function () {
//     return 'You are on the admin dashboard.';
// })->middleware('auth')->name('admin.dashboard');


// 🔒 Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified', 'role:admin'])
    ->name('admin.dashboard');

// 👨‍💼 Employee Dashboard
Route::get('/employee/dashboard', function () {
    return view('employee.dashboard');
})->middleware(['auth', 'verified', 'role:employee'])
  ->name('employee.dashboard');

// 👨‍🎓 Learner Dashboard
Route::get('/learner/dashboard', function () {
    return view('learner.dashboard');
})->middleware(['auth', 'verified', 'role:learner'])
  ->name('learner.dashboard');


// 🛠 Custom Registration
Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// 👥 User Management
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// ✉️ Welcome Email
Route::post('/users/sendmail', [UserController::class, 'sendMail'])->name('users.sendmail');
Route::get('/users/sendmail', fn () => redirect()->route('users.index'));

// 📑 Email Logs
Route::get('/email-logs', [EmailLogController::class,'index'])->name('email.logs');

// 💌 Custom Email
Route::get('/custom-email', [UserController::class, 'customEmailForm'])->name('email.custom.form');
Route::post('/custom-email/send', [UserController::class, 'sendCustomEmail'])->name('email.custom.send');

// ➕ Breeze Auth Routes
require __DIR__.'/auth.php';
