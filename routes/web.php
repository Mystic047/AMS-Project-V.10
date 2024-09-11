<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\testRelationController;
use App\Http\Controllers\DashboardController;

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
require base_path('routes/genPDF.php');

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

 Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
 Route::get('/dashboard/get-activities', [DashboardController::class, 'getActivities']);
 Route::get('/dashboard/get-activity-submissions/{actId}', [DashboardController::class, 'getActivitySubmissions']);
 

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
Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard2', function () {
        return view('/admin/dashboard');
    });
});



;



Route::get('/reportcenter', function () {
    return view('/reports/index');
})->name('reportcenter');

Route::get('/toast', function () {
    return view('/Test/toast');
});


