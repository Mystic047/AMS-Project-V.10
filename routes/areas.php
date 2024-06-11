<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\areaController;


// Area Management
Route::controller(areaController::class)->group(function () {
    Route::get('/AreaManagement', 'showManageView')->name('area.manage'); // Changed the path to avoid conflict

    // Create Area
    Route::get('/createFormArea', 'showCreateView')->name('area.showCreate');
    Route::post('/createArea', 'create')->name('area.create');

    Route::get('/editFormArea/{id}', 'showEditView')->name('area.edit'); // Corrected from 'editFromArea' to 'editFormArea'
    Route::put('/updateArea/{id}', 'update')->name('area.update');
    Route::delete('/deleteArea/{id}', 'destroy')->name('area.delete');
});