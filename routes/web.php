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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/event/add', [App\Http\Controllers\HomeController::class, 'eventAdd'])->name('event.add');

Route::get('/event/get', [App\Http\Controllers\HomeController::class, 'eventGet'])->name('event.get');

Route::post('/event/delete', [App\Http\Controllers\HomeController::class, 'eventDelete'])->name('event.delete');

Route::post('/friend/add', [App\Http\Controllers\HomeController::class, 'friendAdd'])->name('friend.add');

Route::get('/follow/get', [App\Http\Controllers\HomeController::class, 'followGet'])->name('follow.get');

Route::post('/event/get/goo', [App\Http\Controllers\HomeController::class, 'googleEventGet']);

