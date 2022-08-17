<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
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
    return view('index');
});

Route::get('phpinfo', function () {
    phpinfo();
});

// Route::get('order', [OrderController::class,'index'])->name('order');
// Route::post('order_place', [OrderController::class,''])->name('order_place');

Route::resource('order', OrderController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
