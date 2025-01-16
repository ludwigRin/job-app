<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // user routes
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        

    // // job routes
    // Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    // Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    // Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    // Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    // Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
    // Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
    // Route::delete('/jobs/{job}', [CompanyController::class, 'destroy'])->name('jobs.destroy');

    // // company routes
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');

});

require __DIR__.'/auth.php';
