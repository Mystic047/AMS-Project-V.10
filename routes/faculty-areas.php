<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\areaController;
use App\Http\Controllers\facultyController;

// Area Managementจ
Route::controller(areaController::class)->group(function () {
    Route::get('/AreaManagement', 'showManageView')->name('area.manage'); // Changed the path to avoid conflict

    // Create Area
    Route::get('/createFormArea', 'showCreateView')->name('area.showCreate');
    Route::post('/createArea', 'create')->name('area.create');

    Route::get('/editFormArea/{id}', 'showEditView')->name('area.edit'); // Corrected from 'editFromArea' to 'editFormArea'
    Route::put('/updateArea/{id}', 'update')->name('area.update');
    Route::delete('/deleteArea/{id}', 'destroy')->name('area.delete');
});



Route::controller(facultyController::class)->group(function () {
    Route::get('/FacultyManagement', 'showManageView')->name('faculty.manage'); // Kept the path same for faculty

    // Create Faculty
    Route::get('/createFormFaculty', 'showCreateView')->name('faculty.showCreate');
    Route::post('/createFaculty', 'create')->name('faculty.create');

    Route::get('/editFormFaculty/{id}', 'showEditView')->name('faculty.edit'); // Corrected from 'editFromFaculty' to 'editFormFaculty'
    Route::put('/updateFaculty/{id}', 'update')->name('faculty.update');
    Route::delete('/deleteFaculty/{id}', 'destroy')->name('faculty.delete');
});