<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\testRelationController;


require base_path('routes/auth.php');
require base_path('routes/admins.php');
require base_path('routes/professors.php');
require base_path('routes/coordinators.php');
require base_path('routes/students.php');
require base_path('routes/faculty-areas.php');
require base_path('routes/activity.php');
require base_path('routes/activitySubmit.php');
require base_path('routes/fileForDownload.php');
require base_path('routes/news.php');
require base_path('routes/profiles.php');
require base_path('routes/activityCalendar.php');
require base_path('routes/certificate.php');

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

Route::middleware(['role:student'])->group(function () {
    Route::get('/TESTM', function () {
        return view('TESTM');
    });
});

Route::get('/', [homeController::class , 'showHomeView'])->name('welcome.home');
Route::get('/activity-info/{id}', [homeController::class , 'showInfoView'])->name('activity.info');

Route::get('/activity', function () {
    return view('activity');
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



Route::get('/ActivityCreates', function () {
    return view('/activityCreate');
});

Route::get('/ActivityEdits', function () {
    return view('/activityedit');
});
Route::get('/ActivityAll', function () {
    return view('/activityManage');
});
Route::get('/NewManage', function () {
    return view('/admin/managementView/newManage');
});
Route::get('/New', function () {
    return view('new');
});

Route::get('/ActivityCreate', function () {
    return view('admin/createView/activityCreate');
});
Route::get('/ActivityEdit', function () {
    return view('admin/editView/activityEdit');
});
Route::get('/CreateNew', function () {
    return view('createNew');
});
Route::get('/EditNew', function () {
    return view('editNew');
});
Route::get('/ActivityHistory', function () {
    return view('activityHistory');
});
Route::get('/NewDetail', function () {
    return view('newsdetail');
});

Route::get('/AllActivity', function () {
    return view('/activityAll');
});

Route::get('/new-manage-front', function () {
    return view('/newManage');
});
