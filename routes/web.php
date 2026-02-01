<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/project', function () {
    return view('project-masonary');
})->name('project');

Route::get('/project-details', function () {
    return view('project-details');
})->name('project-details');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');

Route::get('/service-details', function () {
    return view('service-details');
})->name('service-details');

Route::get('/team', function () {
    return view('team');
})->name('team');

// Catch-all for other blade files
Route::get('/{page}', function ($page) {
    if (view()->exists($page)) {
        return view($page);
    }
    abort(404);
});
