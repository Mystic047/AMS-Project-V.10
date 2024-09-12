<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsController;

// News Management

// Routes for Admins only
Route::middleware(['role:admin'])->controller(newsController::class)->group(function () {
    // Manage News (Admin-only)
    Route::get('/manage-News', 'showManageView')->name('news.manage');
    Route::get('/manage-News-Front', 'showManageViewFront')->name('news.manageFront');

    // Create News (Admin-only)
    Route::get('/createForm-News', 'showCreateView')->name('news.showCreate');
    Route::get('/createForm-News-Front', 'showCreateViewFront')->name('news.showCreateFront');
    Route::post('/create-News', 'create')->name('news.create');

    // Edit News (Admin-only)
    Route::get('/editForm-News/{id}', 'showEditView')->name('news.edit');
    Route::get('/editForm-News-front/{id}', 'showEditViewFront')->name('news.editFront');
    
    // Update News (Admin-only)
    Route::put('/update-News/{id}', 'update')->name('news.update');

    // Delete News (Admin-only)
    Route::delete('/delete-News/{id}', 'destroy')->name('news.delete');
});

Route::middleware(['role:admin,coordinator'])->controller(newsController::class)->group(function () {
    // Search News (shared between multiple roles)
    Route::get('/manage-News-Front', 'showManageViewFront')->name('news.manageFront');
    Route::get('/createForm-News-Front', 'showCreateViewFront')->name('news.showCreateFront');
    Route::post('/create-News', 'create')->name('news.create');
});

// Routes for both Admins and other roles (e.g., front-end users)
Route::middleware(['role:admin,student,professor,coordinator'])->controller(newsController::class)->group(function () {
    // Search News (shared between multiple roles)
    Route::get('/search-News', 'search')->name('news.search');
    
    // List News (shared between multiple roles)
    Route::get('/list-News', 'showInfoView')->name('news.list');
    
    // View News Details (shared between multiple roles)
    Route::get('/details-News/{id}', 'showDetailsView')->name('news.details');
});
