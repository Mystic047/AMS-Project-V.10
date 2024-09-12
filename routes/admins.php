<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

// Admin Management
Route::middleware(['role:admin'])->controller(adminController::class)->group(function () {
    // Show manage Admin page
    Route::get('/manageAdmin', 'showManageView')->name('admin.manage');

    // Create Admin
    Route::get('/createFormAdmin', 'showCreateView')->name('admin.showCreate');
    Route::post('/createAdmin', 'create')->name('admin.create');

    // Edit Admin
    Route::get('/editFromAdmin/{id}', 'showEditView')->name('admin.edit');
    Route::put('/updateAdmin/{id}', 'update')->name('admin.update');

    // Delete Admin
    Route::delete('/deleteAdmin/{id}', 'destroy')->name('admin.delete');

    // Search Admin
    Route::get('/searchAdmin', 'search')->name('admin.search');
});
