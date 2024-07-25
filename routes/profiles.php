<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;

Route::get('/Profile', function () {
    return view('/profiles');
})->name('profile');

Route::get('/dashboard-user-profile', function () {
    return view('/admin/profiles/profiles');
})->name('dashboard.profile');


Route::put('/profile/update', [profileController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/update-picture', [profileController::class, 'updateProfilePicture'])->name('profile.updatePicture');
