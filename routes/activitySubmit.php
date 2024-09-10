<?php
use App\Http\Controllers\activitySubmitController;
use App\Http\Controllers\activitySubmitHistoryController;
use Illuminate\Support\Facades\Route;

Route::controller(activitySubmitController::class)->group(function () {
    Route::post('/submit-activity', 'submit')->name('activity.submit');
    Route::delete('/submit-cancel/{id}', 'cancelSubmit')->name('activity.cancelSubmit');
    // Route::post('/submit-confirm', 'confirmSubmit')->name('activity.confirmSubmit');
    Route::match(['get', 'post'], '/submit-confirm', 'confirmSubmit')->name('activity.confirmSubmit');
    Route::match(['get', 'post'], '/submit-confirm-qr', 'confirmSubmitQR')->name('activity.confirmSubmitQR');
    Route::get('/activity-list-submit', 'activityList')->name('activity.submitList');
    Route::get('/activity-submissions/{actId}', 'viewSubmissions')->name('activity.viewSubmissions');
    Route::get('/activity-submissions/edit/{id}', 'editSubmit')->name('activity.editSubmit');
    Route::put('/activity-submissions/update/{id}', 'updateSubmit')->name('activity.updateSubmit');
    Route::get('/activity-submissions/create/{actId}', 'createSubmissions')->name('activity.createSubmissions');
    Route::post('/activity-submissions/store', 'storeSubmission')->name('activity.storeSubmission');

});

Route::controller(activitySubmitHistoryController::class)->group(function () {
    Route::get('/submit-history{id}', 'history')->name('activity.submit.history');
});
