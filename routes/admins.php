<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

// Admin Management
Route::controller(adminController::class)->group(function () {
    //show manage Professor page
    Route::get('/manageAdmin', 'showManageView')->name('admin.manage');

    //Create Professor
    Route::get('/createFormAdmin', 'showCreateView')->name('admin.showCreate');
    Route::post('/createAdmin', 'create')->name('admin.create');

    Route::get('/editFromAdmin/{id}', 'showEditView')->name('admin.edit');
    Route::put('/updateAdmin/{id}', 'update')->name('admin.update');
    Route::delete('/deleteAdmin/{id}', 'destroy')->name('admin.delete');
    Route::get('/searchAdmin', 'search')->name('admin.search');

});