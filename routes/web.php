<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/storage/{path}', function (string $path) {
    if (str_contains($path, '..')) {
        abort(404);
    }
    $path = str_replace('\\', '/', $path);
    if (! Storage::disk('public')->exists($path)) {
        abort(404);
    }

    return response()->file(Storage::disk('public')->path($path));
})->where('path', '.*');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    $teamMembers = \App\Models\TeamMember::where('is_active', true)->orderBy('sort_order')->get();
    $teamEnabled = \App\Models\Setting::getValue('team_section_enabled', '1');

    return view('about', compact('teamMembers', 'teamEnabled'));
})->name('about');

Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

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
    $teamMembers = \App\Models\TeamMember::where('is_active', true)->orderBy('sort_order')->get();
    $teamEnabled = \App\Models\Setting::getValue('team_section_enabled', '1');

    return view('team', compact('teamMembers', 'teamEnabled'));
})->name('team');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('tasks', App\Http\Controllers\Admin\TaskController::class);
    Route::post('tasks/{task}/comments', [App\Http\Controllers\Admin\TaskCommentController::class, 'store'])->name('tasks.comments.store');
    Route::resource('team', App\Http\Controllers\Admin\TeamController::class);
    Route::post('team/toggle-section', [App\Http\Controllers\Admin\TeamController::class, 'toggleSection'])->name('team.toggle-section');
    Route::post('team/{id}/toggle', [App\Http\Controllers\Admin\TeamController::class, 'toggleMember'])->name('team.toggle-member');
    Route::resource('partners', App\Http\Controllers\Admin\PartnerController::class);
    Route::post('partners/toggle-section', [App\Http\Controllers\Admin\PartnerController::class, 'toggleSection'])->name('partners.toggle-section');
    Route::post('partners/{id}/toggle', [App\Http\Controllers\Admin\PartnerController::class, 'togglePartner'])->name('partners.toggle-partner');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
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
