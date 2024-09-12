<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fileController;


// Admin and Coordinator roles can manage files
Route::middleware(['role:admin,coordinator,professor'])->controller(fileController::class)->group(function () {
    
    // File Management View (restricted to admin and coordinator)
    Route::get('/file-Management', 'showManageView')->name('file.manage'); 

    // Another view for file management (restricted to admin and coordinator)
    Route::get('/filedowload', 'showManageView2')->name('file.manage2'); 

    // Create File (restricted to admin and coordinator)
    Route::get('/createForm-file', 'showCreateView')->name('file.showCreate');
    Route::post('/create-file', 'create')->name('file.create');

    // Edit File (restricted to admin and coordinator)
    Route::get('/editForm-file/{id}', 'showEditView')->name('file.edit'); 
    Route::put('/update-file/{id}', 'update')->name('file.update');

    // Delete File (restricted to admin and coordinator)
    Route::delete('/delete-file/{id}', 'destroy')->name('file.destroy');

    // Upload File (restricted to admin and coordinator)
    Route::get('/uploadForm-file', 'showUploadView')->name('file.showUpload');
    Route::post('/upload-file', 'upload')->name('file.upload');
});

