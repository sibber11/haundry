<?php

use App\Http\Requests\PhoneVerificationRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::name('admin.')->prefix('admin')->group(function () {
    Auth::routes([
        'login' => true,
        'logout' => true,
        'register' => false,
        'reset' => true,   // for resetting passwords
        'confirm' => false,  // for additional password confirmations
        'verify' => false,  // for email verification
    ]);
});

Route::get('/email/verify', function () {
    return view('customer.auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/')->with('verified', "Your Email has been Verified");
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/phone/verify/{id}/{hash}', function (PhoneVerificationRequest $request) {
    $request->fulfill();
    return redirect('/')->with('verified', "Your Phone has been Verified");
})->middleware(['auth', 'signed'])->name('phone.verification.verify');

Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

//Route::get('verify/resend', [\App\Http\Controllers\Auth\TwoFactorController::class, 'resend'])->name('verify.resend');
//Route::resource('verify', \App\Http\Controllers\Auth\TwoFactorController::class)->only(['index', 'store']);
