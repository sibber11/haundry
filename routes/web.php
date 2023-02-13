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
    return view('new_index');
})->name('home');
Route::get('price-list', function () {
    return view('guest.full-price-list');
})->name('price-list');
Route::get('packages', function () {
    return view('customer.all-packages');
})->name('packages');
Route::post('request_call', [\App\Http\Controllers\Customer\RequestCallController::class, 'request'])->name('request_call');

Route::post('feedback', [\App\Http\Controllers\Customer\FeedbackController::class, 'store'])->name('post_feedback');
