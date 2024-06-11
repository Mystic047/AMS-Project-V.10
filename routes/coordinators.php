<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\coordinatorController;

//Coordinator Management
Route::controller(coordinatorController::class)->group(function () {
    //show manage Professor page
    Route::get('/manageCoordinator', 'showManageView')->name('coordinator.manage');

    //Create Professor
    Route::get('/createFormCoordinator', 'showCreateView')->name('coordinator.showCreate');
    Route::post('/createCoordinator', 'create')->name('coordinator.create');

    Route::get('/editFromCoordinator/{id}', 'showEditView')->name('coordinator.edit');
    Route::put('/updateCoordinator/{id}', 'update')->name('coordinator.update');
    Route::delete('/deleteCoordinator/{id}', 'destroy')->name('coordinator.delete');
    Route::get('/searchCoordinator', 'search')->name('coordinator.search');

});