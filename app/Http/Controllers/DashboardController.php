<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\News;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Activity;
use App\Models\Professor;
use App\Models\Coordinator;
use Illuminate\Http\Request;
use App\Models\ActivitySubmit;
use App\Models\FileForDownload;

class DashboardController extends Controller
{
    public function index()
    {
        // Gather data from models
        $totalAdmins = Admin::count();
        $totalStudents = Student::count();
        $totalProfessors = Professor::count();
        $totalCoordinators = Coordinator::count();
        $totalNews = News::count();
        $totalReports = FileForDownload::count();
        $activities = Activity::select('actName', 'actRegisLimit')->get();

        // Data for faculty or area-wise user distribution
        $facultyData = Area::withCount(['students', 'professors', 'coordinators', 'admins'])->get();

        return view('admin.dashboard', compact('totalAdmins', 'totalStudents', 'totalProfessors', 'totalCoordinators', 'totalNews', 'totalReports', 'activities', 'facultyData'));
    }
    public function getActivities()
    {
        $activities = Activity::all();
        return response()->json($activities);
    }
    

    // Fetch students grouped by area for a selected activity
    public function getActivitySubmissions(Request $request, $actId)
    {
        \Log::info('Fetching activity submissions for actId: ' . $actId);
    
        $submissions = ActivitySubmit::with('student.area')
            ->where('actId', $actId)
            ->get();
    
        \Log::info('Submissions fetched: ', $submissions->toArray());
    
        // Group by area and count, handling null area names
        $groupedSubmissions = $submissions->groupBy(function($submit) {
            return $submit->student->area->areaName ?? 'Unknown Area'; // Group by areaName or 'Unknown Area'
        })->map(function ($group) {
            return $group->count();
        });
    
        \Log::info('Grouped Submissions by Area: ', $groupedSubmissions->toArray());
    
        return response()->json($groupedSubmissions);
    }
    
    
    
    
    
}
