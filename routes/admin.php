<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::resource('customers', App\Http\Controllers\Admin\CustomerController::class)
        ->names([
            'index' => 'admin.customers.index',
            'store' => 'admin.customers.store',
            'show' => 'admin.customers.show',
            'update' => 'admin.customers.update',
            'destroy' => 'admin.customers.destroy',
            'create' => 'admin.customers.create',
            'edit' => 'admin.customers.edit'
        ]);
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class)
        ->names([
            'index' => 'admin.orders.index',
            'store' => 'admin.orders.store',
            'show' => 'admin.orders.show',
            'update' => 'admin.orders.update',
            'destroy' => 'admin.orders.destroy',
            'create' => 'admin.orders.create',
            'edit' => 'admin.orders.edit'
        ]);
    Route::post('orders/update_status', [\App\Http\Controllers\Admin\OrderController::class, 'update_status'])->name('admin.orders.update_status');
    Route::resource('laundry-types', App\Http\Controllers\Admin\LaundryTypeController::class)
        ->names([
            'index' => 'admin.laundryTypes.index',
            'store' => 'admin.laundryTypes.store',
            'show' => 'admin.laundryTypes.show',
            'update' => 'admin.laundryTypes.update',
            'destroy' => 'admin.laundryTypes.destroy',
            'create' => 'admin.laundryTypes.create',
            'edit' => 'admin.laundryTypes.edit'
        ]);

    Route::patch('markdone/{call}', [\App\Http\Controllers\Admin\RequestCallController::class, 'markdone'])->name('admin.markdone');
    Route::delete('request_call/{call}', [\App\Http\Controllers\Admin\RequestCallController::class, 'destroy'])->name('admin.requestCall.destroy');

    Route::get('missions/start', [\App\Http\Controllers\Admin\MissionController::class, 'start'])->name('admin.missions.start');
    Route::get('missions/end', [\App\Http\Controllers\Admin\MissionController::class, 'end'])->name('admin.missions.end');
    Route::patch('missions/complete_one', [\App\Http\Controllers\Admin\MissionController::class, 'complete_one'])->name('admin.missions.complete_one');

    Route::resource('missions', \App\Http\Controllers\Admin\MissionController::class)
        ->names([
            'index' => 'admin.missions.index',
            'store' => 'admin.missions.store',
            'show' => 'admin.missions.show',
            'update' => 'admin.missions.update',
            'destroy' => 'admin.missions.destroy',
            'create' => 'admin.missions.create',
            'edit' => 'admin.missions.edit'
        ]);

    Route::post('missions/assign_orders', [\App\Http\Controllers\Admin\MissionController::class, 'assign_orders'])->name('admin.missions.assign_orders');

    Route::resource('vouchers', \App\Http\Controllers\Admin\VoucherController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.vouchers.index',
            'store' => 'admin.vouchers.store',
            'update' => 'admin.vouchers.update',
            'destroy' => 'admin.vouchers.destroy',
            'create' => 'admin.vouchers.create',
            'edit' => 'admin.vouchers.edit'
        ]);
    Route::get('income', [\App\Http\Controllers\Admin\IncomeController::class, 'index'])->name('admin.income');
    Route::get('home', [HomeController::class, 'index'])->name('admin.home');
    Route::redirect('/', '/admin/home');
    Route::patch('/fcm-token', [HomeController::class, 'updateToken'])->name('fcmToken');
//Route::get('/send-notification', [HomeController::class, 'notification'])->name('notification');
});
//Route::redirect('/', '/admin/home');
Route::group(['prefix' => 'admin/settings'], function () {
    Route::resource('laundry-types', App\Http\Controllers\Admin\LaundryTypeController::class)
        ->names([
            'index' => 'admin.laundryTypes.index',
            'store' => 'admin.laundryTypes.store',
            'show' => 'admin.laundryTypes.show',
            'update' => 'admin.laundryTypes.update',
            'destroy' => 'admin.laundryTypes.destroy',
            'create' => 'admin.laundryTypes.create',
            'edit' => 'admin.laundryTypes.edit'
        ]);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class)
        ->names([
            'index' => 'admin.categories.index',
            'store' => 'admin.categories.store',
            'show' => 'admin.categories.show',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy',
            'create' => 'admin.categories.create',
            'edit' => 'admin.categories.edit'
        ]);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class)
        ->names([
            'index' => 'admin.services.index',
            'store' => 'admin.services.store',
            'show' => 'admin.services.show',
            'update' => 'admin.services.update',
            'destroy' => 'admin.services.destroy',
            'create' => 'admin.services.create',
            'edit' => 'admin.services.edit'
        ]);
    Route::resource('feedbacks', \App\Http\Controllers\Admin\FeedbackController::class)
        ->only(['index', 'update', 'destroy'])
        ->names([
            'index' => 'admin.feedbacks.index',
            'update' => 'admin.feedbacks.update',
            'destroy' => 'admin.feedbacks.destroy',
        ]);

    Route::resource('packages', \App\Http\Controllers\Admin\PackageController::class)
        ->names([
            'index' => 'admin.packages.index',
            'store' => 'admin.packages.store',
            'show' => 'admin.packages.show',
            'update' => 'admin.packages.update',
            'destroy' => 'admin.packages.destroy',
            'create' => 'admin.packages.create',
            'edit' => 'admin.packages.edit'
        ]);

    Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class)
        ->except(['show', 'edit'])
        ->names([
            'index' => 'admin.banners.index',
            'store' => 'admin.banners.store',
            'update' => 'admin.banners.update',
            'destroy' => 'admin.banners.destroy',
            'create' => 'admin.banners.create',
        ]);
    Route::get('about', [\App\Http\Controllers\Admin\SettingsController::class, 'edit'])->name('admin.settings.edit');
    Route::patch('about', [\App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('admin.settings.update');
    Route::get('profile', [\App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('admin.profile');
    Route::patch('profile', [\App\Http\Controllers\Admin\HomeController::class, 'update_profile'])->name('admin.update_profile');
});

