<?php

use Illuminate\Support\Facades\Route;

Route::resource('order', \App\Http\Controllers\Customer\OrderController::class);
Route::post('send_invitation', [\App\Http\Controllers\Customer\ReferController::class, 'send_refer'])->name('send_invitation');
