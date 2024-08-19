<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\certificateController;


Route::get('/certificate/{id}', [certificateController::class, 'generateCertificate'])->name('certificate');
