<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\activitySubmitController;
use App\Http\Controllers\activitySubmitHistoryController;
Route::controller(activitySubmitController::class)->group(function () {
    Route::post('/submit-activity', 'submit')->name('activity.submit');
});

Route::controller(activitySubmitHistoryController::class)->group(function () {
    Route::get('/submit-history{id}', 'history')->name('activity.submit.history');
});