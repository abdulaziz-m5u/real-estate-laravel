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

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('detail/{property:slug}',[\App\Http\Controllers\DetailController::class, 'show'])->name('detail');
Route::post('messages', [\App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');
Route::post('subscribers', [\App\Http\Controllers\SubscriberController::class, 'store'])->name('subscribers.store');

Route::group(['middleware' => ['auth','is_admin'],'prefix' => 'admin','as' => 'admin.'], function() {
    Route::get('dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('messages', App\Http\Controllers\Admin\MessageController::class)->only(['index','destroy']);
    Route::resource('subscribers', App\Http\Controllers\Admin\SubscriberController::class)->only(['index','destroy', 'create', 'store']);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('properties', App\Http\Controllers\Admin\PropertyController::class);
    Route::resource('properties.galleries', App\Http\Controllers\Admin\GalleryController::class)->except(['index', 'create','show']);
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
