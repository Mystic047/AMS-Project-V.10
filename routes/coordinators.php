<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\coordinatorController;

// Coordinator Management

// Routes for Admins only
Route::middleware(['role:admin'])->controller(coordinatorController::class)->group(function () {
    // Show manage Coordinator page
    Route::get('/manageCoordinator', 'showManageView')->name('coordinator.manage');

    // Create Coordinator
    Route::get('/createFormCoordinator', 'showCreateView')->name('coordinator.showCreate');
    Route::post('/createCoordinator', 'create')->name('coordinator.create');

    // Edit Coordinator
    Route::get('/editFromCoordinator/{id}', 'showEditView')->name('coordinator.edit');

    // Delete Coordinator
    Route::delete('/deleteCoordinator/{id}', 'destroy')->name('coordinator.delete');
});

// Routes for both Coordinators and Admins
Route::middleware(['role:coordinator,admin'])->controller(coordinatorController::class)->group(function () {
    // Search Coordinator (allowed for both admin and coordinator)
    Route::get('/editFromCoordinator/{id}', 'showEditView')->name('coordinator.edit');
    Route::put('/updateCoordinator/{id}', 'update')->name('coordinator.update');
    Route::get('/searchCoordinator', 'search')->name('coordinator.search');
});
