<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\professorController;
use App\Http\Controllers\coordinatorController;
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
    });
    
    Route::post('/login/generic', 'loginGeneric')->name('login.generic');
    //logout All user
    Route::post('/logout', 'logout')->name('login.logout');
});

//Student Management
Route::controller(studentController::class)->group(function () {
    //show manage Student page
    Route::get('/manageStudent', 'showManageView')->name('student.manage');

    //Create Student
    Route::get('/createFormStudent', 'showCreateView')->name('student.showCreate');
    Route::post('/createStudent', 'create')->name('student.create');

});

//Professor Management
Route::controller(professorController::class)->group(function () {
    //show manage Professor page
    Route::get('/manageProfessor', 'showManageView')->name('professor.manage');

    //Create Professor
    Route::get('/createFormProfessor', 'showCreateView')->name('professor.showCreate');
    Route::post('/createProfessor', 'create')->name('professor.create');
});

//Coordinator Management
Route::controller(coordinatorController::class)->group(function () {
    //show manage Professor page
    Route::get('/manageCoordinator', 'showManageView')->name('coordinator.manage');

    //Create Professor
    Route::get('/createFormCoordinator', 'showCreateView')->name('coordinator.showCreate');
    Route::post('/createCoordinator', 'create')->name('coordinator.create');
});

// Admin Management 
Route::controller(adminController::class)->group(function () {
    //show manage Professor page
    Route::get('/manageAdmin', 'showManageView')->name('admin.manage');

    //Create Professor
    Route::get('/createFormAdmin', 'showCreateView')->name('admin.showCreate');

    Route::post('/createAdmin', 'create')->name('admin.create');
});

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/testlogin', [customAuthController::class, 'showLoginForm'])->name('login.show');

// Route::get('/admin/dashboard', [customAuthController::class,'showAdminDashboard'])->name('admin.dashboard');
// Route::get('/admin/login', [customAuthController::class,'showAdminLoginForm'])->name('admin.login');
// Route::get('/admin/login', [customAuthController::class,'loginAdmin']);

Route::get('/', function () {
    return view('welcome');
})->name('welcome.home');

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/fileupload', function () {
    return view('fileupload');
});
Route::get('/activity', function () {
    return view('activity');
});

Route::get('/filedowload', function () {
    return view('filedowload');
});
Route::get('/dashboard', function () {
    return view('/admin/dashboard');
});
Route::get('/ActivityCoordinatorsCreate', function () {
    return view('/admin/createView/activitycoordinatorsCreate');
});

Route::get('/createStuUser', function () {
    return view('/admin/user/createStu');
});

Route::get('/ProfessorCreate', function () {
    return view('/admin/createView/professorCreate');
});

Route::get('/ActivitycoordinatorsManagement', function () {
    return view('/admin/managementView/activitycoordinatorsManage');
});
Route::get('/FacultyManagement', function () {
    return view('/admin/managementView/faculty-areaManage');
});
Route::get('/FacultyCreate', function () {
    return view('/admin/createView/facultyCreate');
});
Route::get('/AreaCreate', function () {
    return view('/admin/createView/areaCreate');
});
Route::get('/StudentManagement', function () {
    return view('/admin/managementView/studentManage');
});
Route::get('/AdminManagement', function () {
    return view('/admin/managementView/adminManage');
});
Route::get('/ProfessorManagement', function () {
    return view('/admin/managementView/professorManage');
});
Route::get('/AdminCreate', function () {
    return view('/admin/createView/admincreate');
});

///////////////////Edit
Route::get('/AdminEdit', function () {
    return view('/admin/editView/adminEdit');
});
Route::get('/StudentEdit', function () {
    return view('/admin/editView/studentEdit');
});
Route::get('/ProfessorEdit', function () {
    return view('/admin/editView/professorEdit');
});
Route::get('/ActivityCoordinatorsEdit', function () {
    return view('/admin/editView/activitycoordinatorsEdit');
});
Route::get('/AreaEdit', function () {
    return view('/admin/editView/areaEdit');
});
Route::get('/FacultyEdit', function () {
    return view('/admin/editView/facultyEdit');
});


///เทสเล่น
Route::get('/Profile', function () {
    return view('/profiles');
});
Route::get('/ActivityCreate', function () {
    return view('/activitycreate');
});
Route::get('/ActivityView', function () {
    return view('/activityview');
});
Route::get('/NewManage', function () {
    return view('/admin/managementView/newManage');
});
Route::get('/New', function () {
    return view('new');
});
