<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\calendarController;

Route::get('/activity-calendar', [calendarController::class, 'calendar']);
Route::get('/activity-calendar-show', [calendarController::class, 'showCalendar'])->name('activity.calendar');