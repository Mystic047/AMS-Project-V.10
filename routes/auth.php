<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\customAuthController;

Route::controller(customAuthController::class)->group(function () {
    //User
    // Route::get('/testlogin', 'showLoginForm')->name('login.show');
    // Route::get('/logininfo', 'showLoginInfo')->name('login.showinfo');
    // Route::post('/logintesting', 'login')->name('login.login');

    //Admin
    Route::get('/admin/dashboard', 'showAdminDashboard')->name('admin.dashboard');
    Route::get('/admin/login/form', 'showAdminLoginForm')->name('admin.show');
    Route::post('/admin/login', 'loginAdmin')->name('admin.login');

    //Student
    Route::get('/student/dashboard', 'showStudentDashboard')->name('student.dashboard');
    Route::get('/student/login/form', 'showStudentLoginForm')->name('student.show');
    Route::post('/student/login', 'loginStudent')->name('student.login');

    //Professor
    Route::get('/professor/dashboard', 'showProfessorDashboard')->name('professor.dashboard');
    Route::get('/professor/login/form', 'showProfessorLoginForm')->name('professor.show');
    Route::post('/professor/login', 'loginProfessor')->name('professor.login');

    //Coordinator
    Route::get('/coordinator/dashboard', 'showCoordinatorDashboard')->name('coordinator.dashboard');
    Route::get('/coordinator/login/form', 'showCoordinatorLoginForm')->name('coordinator.show');
    Route::post('/coordinator/login', 'loginCoordinator')->name('coordinator.login');

    //Login 3 user
    Route::get('/login', function () {
        return view('login');
    })->name('login.show');

    //login admin
    Route::get('/admin/login', function () {
        return view('/adminlogin');
    })->name('adminlogin.show');

    Route::post('/login/generic', 'loginGeneric')->name('login.generic');
    //logout All user
    Route::post('/logout', 'logout')->name('login.logout');
});