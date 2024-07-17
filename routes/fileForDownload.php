<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fileController;


Route::controller(fileController::class)->group(function () {
    Route::get('/file-Management', 'showManageView')->name('file.manage'); // Changed the path to avoid conflict
    Route::get('/filedowload', 'showManageView2')->name('file.manage2'); // Changed the path to avoid conflict

    // Create Area
    Route::get('/createForm-file', 'showCreateView')->name('file.showCreate');
    Route::post('/create-file', 'create')->name('file.create');

    Route::get('/editForm-file/{id}', 'showEditView')->name('file.edit'); 
    Route::put('/update-file/{id}', 'update')->name('file.update');

    Route::delete('/delete-file/{id}', 'destroy')->name('file.destroy');

    //secondary upload
    Route::get('/uploadForm-file', 'showUploadView')->name('file.showUpload');
    Route::post('/upload-file', 'upload')->name('file.upload');
});
