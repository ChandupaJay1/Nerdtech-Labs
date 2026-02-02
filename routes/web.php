<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/project', [App\Http\Controllers\ProjectController::class, 'index'])->name('project');

Route::get('/project-details/{id}', [App\Http\Controllers\ProjectController::class, 'show'])->name('project-details');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');

Route::get('/service-details/{id}', [App\Http\Controllers\ServiceController::class, 'show'])->name('service-details');

Route::get('/team', function () {
    return view('team');
})->name('team');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Catch-all
|--------------------------------------------------------------------------
*/
Route::get('/{page}', function ($page) {
    if (view()->exists($page)) {
        return view($page);
    }
    abort(404);
});
