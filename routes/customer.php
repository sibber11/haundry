<?php

use Illuminate\Support\Facades\Route;

Route::resource('orders', \App\Http\Controllers\Customer\OrderController::class);
Route::post('send_invitation', [\App\Http\Controllers\Customer\ReferController::class, 'send_refer'])->name('send_invitation');

Route::get('profile', [\App\Http\Controllers\Customer\ProfileController::class, 'index'])->name('profile');
Route::get('address', [\App\Http\Controllers\Customer\ProfileController::class, 'edit_address'])->name('address.edit');
Route::post('address', [\App\Http\Controllers\Customer\ProfileController::class, 'update_address'])->name('address.update');
Route::get('vouchers', [\App\Http\Controllers\Customer\ProfileController::class, 'voucher'])->name('voucher');
Route::patch('update_profile', [\App\Http\Controllers\Customer\ProfileController::class, 'update_profile'])->name('customer.update_profile');
Route::post('claim_voucher', [\App\Http\Controllers\Customer\ProfileController::class, 'claim_voucher'])->name('claim_voucher');

Route::post('check_voucher', [\App\Http\Controllers\Customer\ProfileController::class, 'check_voucher'])->name('check_voucher');

Route::get('refer', [\App\Http\Controllers\Customer\ReferController::class, 'view_refer'])->name('referview');
Route::post('refer', [\App\Http\Controllers\Customer\ReferController::class, 'send_refer'])->name('sendrefer');

Route::get('package/{package}', [\App\Http\Controllers\Customer\PackageController::class, 'show'])->name('package');
Route::post('package/{package}', [\App\Http\Controllers\Customer\PackageController::class, 'buy'])->name('buy_package');
