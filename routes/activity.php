<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\activityController;

// Routes for Admins Only
Route::middleware(['role:admin,professor,coordinator'])->controller(activityController::class)->group(function () {
    Route::get('/manage-activity', 'showManageView')->name('activity.manage');
    
    Route::get('/create-activity', 'showCreateView')->name('activity.showCreate');
    Route::post('/create-activity', 'create')->name('activity.create');

    Route::get('/edit-form-activity/{id}', 'showEditView')->name('activity.edit');
    Route::put('/update-activity/{id}', 'update')->name('activity.update');
    Route::delete('/delete-activity/{id}', 'destroy')->name('activity.delete');
    
    Route::get('/search-activity', 'search')->name('activity.search');
    
    Route::post('/activity/toggle/{id}', 'toggleStatus')->name('activity.toggleStatus');
    
  
});

// Routes for Frontend Users (Accessible to Everyone)
Route::controller(activityController::class)->group(function () {
    Route::get('/activity-manage-front', 'showManageViewFront')->name('activity.manageFront');
    Route::get('/activity-create-front', 'showCreateViewFront')->name('activity.createFront');
    Route::get('/edit-form-activity-front/{id}', 'showEditViewFront')->name('activity.editFront');
    Route::get('/activity-all-front', 'showActivityAllViewFront')->name('activity.showFront');  
    Route::get('/activity/{id}/pdf', 'generatePDF')->name('activity.pdf');
});
