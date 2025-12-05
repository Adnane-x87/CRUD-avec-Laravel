<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;

Route::get('/', fn() => redirect()->route('admin.dashboard'));

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route::middleware(['auth'])->group(function () {
     Route::get('/admin', function () {
        return view('admin.dashboard');
     })->name('admin.dashboard');

     // Admin article routes with admin.articles.* names
     Route::resource('admin/articles', ArticleController::class)
          ->names('admin.articles')
          ->except(['show']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');