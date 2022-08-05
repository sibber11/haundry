<?php

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
