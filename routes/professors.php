<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\professorController;

//Professor Management
Route::controller(professorController::class)->group(function () {
    //show manage Professor page
    Route::get('/manageProfessor', 'showManageView')->name('professor.manage');

    //Create Professor
    Route::get('/createFormProfessor', 'showCreateView')->name('professor.showCreate');
    Route::post('/createProfessor', 'create')->name('professor.create');

    Route::get('/editFromProfessor/{id}', 'showEditView')->name('professor.edit');
    Route::put('/updateProfessor/{id}', 'update')->name('professor.update');
    Route::delete('/deleteProfessor/{id}', 'destroy')->name('professor.delete');
    Route::get('/searchProfessor', 'search')->name('professor.search');

});