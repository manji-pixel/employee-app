<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Route::any('/index', [EmployeeController::class, 'index'])->name('create_employee');
    Route::any('/create', [EmployeeController::class, 'create'])->name('create_employee');
    Route::any('/store', [EmployeeController::class, 'store'])->name('employee_store');
    Route::any('/edit', [EmployeeController::class, 'edit'])->name('employee_edit');
    Route::any('/update', [EmployeeController::class, 'update'])->name('employee_update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
