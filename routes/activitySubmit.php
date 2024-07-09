<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\activitySubmitController;

Route::controller(activitySubmitController::class)->group(function () {
    Route::post('/submit-activity', 'submit')->name('activity.submit');
});
