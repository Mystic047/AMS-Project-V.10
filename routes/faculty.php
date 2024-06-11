<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\facultyController;

Route::controller(facultyController::class)->group(function () {
    Route::get('/FacultyManagement', 'showManageView')->name('faculty.manage'); // Kept the path same for faculty

    // Create Faculty
    Route::get('/createFormFaculty', 'showCreateView')->name('faculty.showCreate');
    Route::post('/createFaculty', 'create')->name('faculty.create');

    Route::get('/editFormFaculty/{id}', 'showEditView')->name('faculty.edit'); // Corrected from 'editFromFaculty' to 'editFormFaculty'
    Route::put('/updateFaculty/{id}', 'update')->name('faculty.update');
    Route::delete('/deleteFaculty/{id}', 'destroy')->name('faculty.delete');
});