<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');
Route::get('/services', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('services');
Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');
Route::get('/gallery', [App\Http\Controllers\Frontend\GalleryController::class, 'index'])->name('gallery');
