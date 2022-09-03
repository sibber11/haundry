<?php
use Illuminate\Support\Facades\Route;

Route::resource('order', \App\Http\Controllers\Customer\OrderController::class);
