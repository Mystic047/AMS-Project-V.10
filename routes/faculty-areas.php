<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\areaController;
use App\Http\Controllers\facultyController;

// Area Managementจ
// Area Management (restricted to admin and coordinator)
Route::middleware(['role:admin,coordinator'])->controller(areaController::class)->group(function () {
    Route::get('/AreaManagement', 'showManageView')->name('area.manage'); // Manage Area view

    // Create Area
    Route::get('/createFormArea', 'showCreateView')->name('area.showCreate');
    Route::post('/createArea', 'create')->name('area.create');

    // Edit Area
    Route::get('/editFormArea/{id}', 'showEditView')->name('area.edit');
    Route::put('/updateArea/{id}', 'update')->name('area.update');

    // Delete Area
    Route::delete('/deleteArea/{id}', 'destroy')->name('area.delete');
});




// Faculty Management (restricted to admin only)
Route::middleware(['role:admin'])->controller(facultyController::class)->group(function () {
    Route::get('/FacultyManagement', 'showManageView')->name('faculty.manage'); // Manage Faculty view

    // Create Faculty
    Route::get('/createFormFaculty', 'showCreateView')->name('faculty.showCreate');
    Route::post('/createFaculty', 'create')->name('faculty.create');

    // Edit Faculty
    Route::get('/editFormFaculty/{id}', 'showEditView')->name('faculty.edit');
    Route::put('/updateFaculty/{id}', 'update')->name('faculty.update');

    // Delete Faculty
    Route::delete('/deleteFaculty/{id}', 'destroy')->name('faculty.delete');
});
