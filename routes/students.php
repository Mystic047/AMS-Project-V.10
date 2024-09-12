<?php
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

//Student Management

// Routes for Admins only
Route::middleware(['role:admin'])->controller(studentController::class)->group(function () {
    //show manage Student page
    Route::get('/manageStudent', 'showManageView')->name('student.manage');

    // Create Student
    Route::get('/createFormStudent', 'showCreateView')->name('student.showCreate');
    Route::post('/createStudent', 'create')->name('student.create');

    // Edit Student
    Route::get('/editFromStudent/{id}', 'showEditView')->name('student.edit');

    // Delete Student
    Route::delete('/deleteStudent/{id}', 'destroy')->name('student.delete');
});

// Routes for both Students and Admins (or other roles)
Route::middleware(['role:student,admin'])->controller(studentController::class)->group(function () {
    // Search Student (allowed for both admin and student)

    Route::get('/editFromStudent/{id}', 'showEditView')->name('student.edit');
    Route::put('/updateStudent/{id}', 'update')->name('student.update');
    Route::get('/searchStudent', 'search')->name('student.search');
});
