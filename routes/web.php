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
    return view('index');
});
Route::get('price-list', function () {
    return view('full-price-list');
})->name('price-list');

Route::get('phpinfo', function () {
    phpinfo();
});
Route::middleware('guest:admin')->get('admin/login', function () {
    return view('auth.login');
})->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin.attempt');

Route::post('request_call', [\App\Http\Controllers\RequestCallController::class, 'request'])->name('request_call');
