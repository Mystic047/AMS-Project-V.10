<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\generatePDFController;

Route::get('/generate-activities-pdf', [generatePDFController::class, 'generateActivitiesPDFByDate'])->name('activity.report.pdf');
Route::get('/activity-history-pdf', [generatePDFController::class, 'generateUserActivityHistoryPDF'])->name('activity.history.pdf');
Route::get('/admin/activity-history-pdf/{id}', [generatePDFController::class, 'generateUserActivityHistoryPDF2'])->name('admin.activity.history.pdf');
Route::get('/responsible-person-pdf', [generatePDFController::class, 'generateResponsiblePersonPDF'])->name('responsible.person.pdf');
