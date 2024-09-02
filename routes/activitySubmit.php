<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\activitySubmitController;
use App\Http\Controllers\activitySubmitHistoryController;

Route::controller(activitySubmitController::class)->group(function () {
    Route::post('/submit-activity', 'submit')->name('activity.submit');
    Route::delete('/submit-cancel/{id}', 'cancelSubmit')->name('activity.cancelSubmit');
    Route::post('/submit-confirm', 'confirmSubmit')->name('activity.confirmSubmit');
    Route::get('/activity-list-submit', 'activityList')->name('activity.submitList');
    Route::get('/activity-submissions/{actId}', 'viewSubmissions')->name('activity.viewSubmissions');
    Route::get('/activity-submissions/edit/{id}', 'editSubmit')->name('activity.editSubmit');
    Route::put('/activity-submissions/update/{id}', 'updateSubmit')->name('activity.updateSubmit');
});


Route::controller(activitySubmitHistoryController::class)->group(function () {
    Route::get('/submit-history{id}', 'history')->name('activity.submit.history');
});