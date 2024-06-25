<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\testRelationController;
use App\Http\Controllers\Auth\customAuthController;

require base_path('routes/auth.php');
require base_path('routes/admins.php');
require base_path('routes/professors.php');
require base_path('routes/coordinators.php');
require base_path('routes/students.php');
require base_path('routes/faculty-areas.php');
require base_path('routes/activity.php');
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

 Route::get('/testRelation', [testRelationController::class , 'indexAction'])->name('testRelation');


// Faculty Management




Route::middleware(['role:student'])->group(function () {
    Route::get('/TESTM', function () {
        return view('TESTM');
    });
});


// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/testlogin', [customAuthController::class, 'showLoginForm'])->name('login.show');

// Route::get('/admin/dashboard', [customAuthController::class,'showAdminDashboard'])->name('admin.dashboard');
// Route::get('/admin/login', [customAuthController::class,'showAdminLoginForm'])->name('admin.login');
// Route::get('/admin/login', [customAuthController::class,'loginAdmin']);

Route::get('/', [homeController::class , 'showHomeView'])->name('welcome.home');
Route::get('/activity-info/{id}', [homeController::class , 'showInfoView'])->name('activity.info');



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
Route::get('/NewCreate', function () {
    return view('/admin/createView/newCreate');
});
Route::get('/FileCreate', function () {
    return view('/admin/createView/fileCreate');
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
Route::get('/NewEdit', function () {
    return view('/admin/editView/newEdit');
});


Route::get('/FileManagement', function () {
    return view('/admin/managementView/fileManage');
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


// Route::get('/ActivityManagement', function () {
//     return view('admin/managementView/activityManage');
// });

Route::get('/ActivityCreate', function () {
    return view('admin/createView/activityCreate');
});
Route::get('/ActivityEdit', function () {
    return view('admin/editView/activityEdit');
});
