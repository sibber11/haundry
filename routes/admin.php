<?php

use Illuminate\Support\Facades\Route;

Route::resource('admin/laundry-types', App\Http\Controllers\Admin\LaundryTypeController::class)
    ->names([
        'index' => 'admin.laundryTypes.index',
        'store' => 'admin.laundryTypes.store',
        'show' => 'admin.laundryTypes.show',
        'update' => 'admin.laundryTypes.update',
        'destroy' => 'admin.laundryTypes.destroy',
        'create' => 'admin.laundryTypes.create',
        'edit' => 'admin.laundryTypes.edit'
    ]);

Route::resource('admin/customers', App\Http\Controllers\Admin\CustomerController::class)
    ->names([
        'index' => 'admin.customers.index',
        'store' => 'admin.customers.store',
        'show' => 'admin.customers.show',
        'update' => 'admin.customers.update',
        'destroy' => 'admin.customers.destroy',
        'create' => 'admin.customers.create',
        'edit' => 'admin.customers.edit'
    ]);
Route::resource('admin/orders', App\Http\Controllers\Admin\OrderController::class)
    ->names([
        'index' => 'admin.orders.index',
        'store' => 'admin.orders.store',
        'show' => 'admin.orders.show',
        'update' => 'admin.orders.update',
        'destroy' => 'admin.orders.destroy',
        'create' => 'admin.orders.create',
        'edit' => 'admin.orders.edit'
    ]);
Route::post('admin/orders/{id}/update_status', [\App\Http\Controllers\Admin\OrderController::class, 'update_status'])->name('admin.orders.update_status');
Route::resource('admin/laundry-types', App\Http\Controllers\Admin\LaundryTypeController::class)
    ->names([
        'index' => 'admin.laundryTypes.index',
        'store' => 'admin.laundryTypes.store',
        'show' => 'admin.laundryTypes.show',
        'update' => 'admin.laundryTypes.update',
        'destroy' => 'admin.laundryTypes.destroy',
        'create' => 'admin.laundryTypes.create',
        'edit' => 'admin.laundryTypes.edit'
    ]);

Route::resource('admin/categories', App\Http\Controllers\Admin\CategoryController::class)
    ->names([
        'index' => 'admin.categories.index',
        'store' => 'admin.categories.store',
        'show' => 'admin.categories.show',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
        'create' => 'admin.categories.create',
        'edit' => 'admin.categories.edit'
    ]);
Route::resource('admin/services', App\Http\Controllers\Admin\ServiceController::class)
    ->names([
        'index' => 'admin.services.index',
        'store' => 'admin.services.store',
        'show' => 'admin.services.show',
        'update' => 'admin.services.update',
        'destroy' => 'admin.services.destroy',
        'create' => 'admin.services.create',
        'edit' => 'admin.services.edit'
    ]);

Route::get('markdone/{call}', [\App\Http\Controllers\RequestCallController::class, 'markdone'])->name('admin.markdone');

Route::get('admin/missions/start', [\App\Http\Controllers\Admin\MissionController::class, 'start'])->name('admin.missions.start');
Route::get('admin/missions/end', [\App\Http\Controllers\Admin\MissionController::class, 'end'])->name('admin.missions.end');

Route::resource('admin/missions', \App\Http\Controllers\Admin\MissionController::class)
    ->names([
        'index' => 'admin.missions.index',
        'store' => 'admin.missions.store',
        'show' => 'admin.missions.show',
        'update' => 'admin.missions.update',
        'destroy' => 'admin.missions.destroy',
        'create' => 'admin.missions.create',
        'edit' => 'admin.missions.edit'
    ]);

Route::post('admin/missions/assign_orders', [\App\Http\Controllers\Admin\MissionController::class, 'assign_orders'])->name('admin.missions.assign_orders');
