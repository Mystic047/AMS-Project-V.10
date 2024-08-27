<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsController;

// Admin Management
Route::controller(newsController::class)->group(function () {
    //show manage news page
    Route::get('/manage-News', 'showManageView')->name('news.manage');
    Route::get('/manage-News-Front', 'showManageViewFront')->name('news.manageFront');
    //Create news
    Route::get('/createForm-News', 'showCreateView')->name('news.showCreate');
    Route::get('/createForm-News-Front', 'showCreateViewFront')->name('news.showCreateFront');
    Route::post('/create-News', 'create')->name('news.create');

    Route::get('/editForm-News/{id}', 'showEditView')->name('news.edit');
    Route::get('/editForm-News-front/{id}', 'showEditViewFront')->name('news.editFront');
    Route::put('/update-News/{id}', 'update')->name('news.update');
    Route::delete('/delete-News/{id}', 'destroy')->name('news.delete');
    Route::get('/search-News', 'search')->name('news.search');


    Route::get('/list-News', 'showInfoView')->name('news.list');
    Route::get('/details-News/{id}', 'showDetailsView')->name('news.details');
});