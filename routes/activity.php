<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\activityController;

Route::controller(activityController::class)->group(function () {
    //show manage Professor page
    Route::get('/manage-activity', 'showManageView')->name('activity.manage');

    //Create Professor
    Route::get('/create-activity', 'showCreateView')->name('activity.showCreate');
    Route::post('/create-activity', 'create')->name('activity.create');

    Route::get('/edit-form-activity/{id}', 'showEditView')->name('activity.edit');
    Route::put('/update-activity/{id}', 'update')->name('activity.update');
    Route::delete('/delete-activity/{id}', 'destroy')->name('activity.delete');
    Route::get('/search-activity', 'search')->name('activity.search');

});