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

Auth::routes();

Route::get('/my-posts', [App\Http\Controllers\PostController::class, 'index'])->middleware('auth')
    ->name('my_posts');

Route::middleware('auth')->controller(App\Http\Controllers\PostController::class)
    ->prefix('post')
    ->name('post.')
    ->group(static function() {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{post}', 'edit')->name('edit');
        Route::post('/update/{post}', 'update')->name('update');
        Route::get('/show/{post}', 'show')->name('show');
        Route::get('/delete/{post}', 'destroy')->name('delete');
});
