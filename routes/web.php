<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\customAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(customAuthController::class)->group(function () {
    //User
    Route::get('/testlogin', 'showLoginForm')->name('login.show');
    Route::get('/logininfo', 'showLoginInfo')->name('login.showinfo');
    Route::post('/logintesting', 'login')->name('login.login');


    //Admin
    Route::get('/admin/dashboard', 'showAdminDashboard')->name('admin.dashboard');
    Route::get('/admin/login/form', 'showAdminLoginForm')->name('admin.show');
    Route::post('/admin/login', 'loginAdmin')->name('admin.login');

    //logout All user
    Route::post('/logout', 'logout')->name('login.logout');
});

// Route::get('/testlogin', [customAuthController::class, 'showLoginForm'])->name('login.show');

// Route::get('/admin/dashboard', [customAuthController::class,'showAdminDashboard'])->name('admin.dashboard');
// Route::get('/admin/login', [customAuthController::class,'showAdminLoginForm'])->name('admin.login');
// Route::get('/admin/login', [customAuthController::class,'loginAdmin']);



Route::get('/', function () {
    return view('welcome');
});
