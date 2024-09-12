<?php
use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Route;

// Profile routes accessible by any authenticated user
// Apply middleware for all roles: admin, student, professor, coordinator
Route::middleware(['role:student,professor,coordinator,admin'])->group(function () {
    Route::get('/Profile', function () {
        return view('/profiles');
    })->name('profile');

    Route::put('/profile/update', [profileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update-picture', [profileController::class, 'updateProfilePicture'])->name('profile.updatePicture');
});


// Route accessible only by admin
Route::middleware(['role:admin'])->get('/dashboard-user-profile', function () {
    return view('/admin/profiles/profiles');
})->name('dashboard.profile');
