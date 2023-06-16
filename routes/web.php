<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::resource('category', App\Http\Controllers\CategoryController::class)->except(['show']);
    Route::resource('post', App\Http\Controllers\PostController::class)->except(['show']);
    Route::get('/post/{categoryid?}', [App\Http\Controllers\PostController::class, 'index'])->name('viewposts');
    Route::get('/post-view/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('postDetail');
    
});