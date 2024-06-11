<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;


//Student Management
Route::controller(studentController::class)->group(function () {
    //show manage Student page
    Route::get('/manageStudent', 'showManageView')->name('student.manage');

    //Create Student
    Route::get('/createFormStudent', 'showCreateView')->name('student.showCreate');
    Route::post('/createStudent', 'create')->name('student.create');

    Route::get('/editFromStudent/{id}', 'showEditView')->name('student.edit');
    Route::put('/updateStudent/{id}', 'update')->name('student.update');

    Route::delete('/deleteStudent/{id}', 'destroy')->name('student.delete');
    Route::get('/searchStudent', 'search')->name('student.search');

});