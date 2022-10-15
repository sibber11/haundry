<?php

use Illuminate\Support\Facades\Route;

Route::resource('orders', \App\Http\Controllers\Customer\OrderController::class);
Route::post('send_invitation', [\App\Http\Controllers\Customer\ReferController::class, 'send_refer'])->name('send_invitation');

Route::get('profile', [\App\Http\Controllers\Customer\ProfileController::class, 'index'])->name('profile');
Route::get('vouchers', [\App\Http\Controllers\Customer\ProfileController::class, 'voucher'])->name('voucher');
Route::patch('update_profile', [\App\Http\Controllers\Customer\ProfileController::class, 'update_profile'])->name('customer.update_profile');
Route::post('claim_voucher', [\App\Http\Controllers\Customer\ProfileController::class, 'claim_voucher'])->name('claim_voucher');

Route::post('check_voucher', [\App\Http\Controllers\Customer\ProfileController::class, 'check_voucher'])->name('check_voucher');

Route::get('refer', [\App\Http\Controllers\Customer\ReferController::class, 'view_refer'])->name('referview');
Route::post('refer', [\App\Http\Controllers\Customer\ReferController::class, 'send_refer'])->name('sendrefer');
