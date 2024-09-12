<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\professorController;

//Professor Management
// Professor Management

// Routes for Admins only
Route::middleware(['role:admin'])->controller(professorController::class)->group(function () {
    // Manage Professor page (Admin-only)
    Route::get('/manageProfessor', 'showManageView')->name('professor.manage');

    // Create Professor (Admin-only)
    Route::get('/createFormProfessor', 'showCreateView')->name('professor.showCreate');
    Route::post('/createProfessor', 'create')->name('professor.create');

    // Edit Professor (Admin-only)
    Route::get('/editFromProfessor/{id}', 'showEditView')->name('professor.edit');

    // Delete Professor (Admin-only)
    Route::delete('/deleteProfessor/{id}', 'destroy')->name('professor.delete');
});

// Routes for both Professors and Admins
Route::middleware(['role:professor,admin'])->controller(professorController::class)->group(function () {
    // Edit Professor (shared between professor and admin)
    Route::get('/editFromProfessor/{id}', 'showEditView')->name('professor.edit');

    // Update Professor (shared between professor and admin)
    Route::put('/updateProfessor/{id}', 'update')->name('professor.update');

    // Search Professor (shared between professor and admin)
    Route::get('/searchProfessor', 'search')->name('professor.search');
});
