<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\ActivitySubmit;
use Illuminate\Support\Facades\Log;

class activitySubmitController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'userId' => 'required|integer',
            'actId' => 'required|integer',
        ]);

        Log::info('User ID: ' . $request->input('userId'));
        Log::info('Activity ID: ' . $request->input('actId'));

        // Fetch the activity to check the registration limit
        $activity = Activity::find($request->input('actId'));
        if (!$activity) {
            return redirect()->back()->with('error', 'ไม่พบกิจกรรมนี้');
        }

        // Count the current submissions for the activity
        $currentSubmissionsCount = ActivitySubmit::where('actId', $request->input('actId'))->count();

        if ($currentSubmissionsCount >= $activity->actRegisLimit) {
            return redirect()->back()->with('error', 'จำนวนการลงทะเบียนสำหรับกิจกรรมนี้เต็มแล้ว');
        }

        // Check if the record already exists
        $existingSubmission = ActivitySubmit::where('userId', $request->input('userId'))
            ->where('actId', $request->input('actId'))
            ->first();

        if ($existingSubmission) {
            return redirect()->back()->with('error', 'กิจกรรมนี้ได้รับการส่งแล้ว');
        }

        // Create the new submission using fill method
        $activitySubmit = new ActivitySubmit();
        $activitySubmit->fill($request->all());
        $activitySubmit->save();

        return redirect()->back()->with('success', 'สมัครกิจกรรมเรียบร้อยแล้ว');
    }

    public function cancelSubmit($id)
    {
        $actSubmit = ActivitySubmit::find($id)->delete();
        return back()->with('success', 'การลงทะเบียนถูกลบเรียบร้อยแล้ว!');

    }

    public function confirmSubmit(Request $request)
    {
        // Validate request inputs (both GET and POST)
        $request->validate([
            'actSubmitId' => 'required|exists:activitysubmit,actSubmitId',
            'code' => 'required|string',
            'session' => 'required|in:morning,afternoon',
        ]);

        $authenticatedUser = getAuthenticatedUser();

        if (!$authenticatedUser) {
            return back()->with('error', 'คุณต้องเข้าสู่ระบบก่อน');
        }

        // Fetch the ActivitySubmit record and ensure it belongs to the authenticated user
        $actSubmit = ActivitySubmit::where('actSubmitId', $request->actSubmitId)
            ->where('userId', $authenticatedUser->userId)
            ->first();

        if (!$actSubmit) {
            return back()->with('error', 'ไม่พบการส่งกิจกรรมนี้สำหรับผู้ใช้');
        }

        // Proceed with the check-in process using the enrollment key and session
        if ($actSubmit->checkIn($request->code, $request->session)) {
            return back()->with('success', 'เช็คอินสำเร็จ!');
        } else {
            return back()->with('error', 'รหัสการเข้าร่วมหรือเซสชันไม่ถูกต้อง.');
        }
    }

    public function confirmSubmitQR(Request $request)
    {
        // Validate the request (actId, code, session are passed via the QR code)
        $request->validate([
            'actId' => 'required|exists:activity,actId',
            'code' => 'required|string',
            'session' => 'required|in:morning,afternoon',
        ]);
    
        $authenticatedUser = getAuthenticatedUser();
    
        if (!$authenticatedUser) {
            return redirect()->route('login.show')->with('error', 'คุณต้องเข้าสู่ระบบก่อน');
        }
    
        // Fetch the ActivitySubmit record based on activity and user
        $actSubmit = ActivitySubmit::where('actId', $request->actId)
            ->where('userId', $authenticatedUser->userId)
            ->first();
    
        if (!$actSubmit) {
            return redirect()->route('welcome.home')->with('error', 'ไม่พบการลงทะเบียนกิจกรรมนี้สำหรับผู้ใช้นี้');
        }
    
        // Proceed with the check-in process using the enrollment key and session
        if ($actSubmit->checkIn($request->code, $request->session)) {
            return redirect()->route('activity.submit.history',$authenticatedUser->userId)->with('success', 'เช็คอินสำเร็จแล้ว!');
        } else {
            return redirect()->route('activity.submit.history' , $authenticatedUser->userId)->with('error', 'รหัสการเข้าร่วมหรือเซสชันไม่ถูกต้อง.');
        }
    }
    

    public function activityList()
    {
        $activities = Activity::all();

        return view('/admin/managementView/activitySubmitManage', compact('activities'));
    }

    public function viewSubmissions($actId)
    {
        $activitySubmits = ActivitySubmit::where('actId', $actId)->get();
        return view('/admin/activitySubmit/activitySubmissions', compact('activitySubmits', 'actId'));
    }

    public function createSubmissions($actId)
    {
        $users = Student::all(); // Fetch all users
        $activity = Activity::find($actId); // Find the activity by ID
    
        if (!$activity) {
            return redirect()->back()->with('error', 'Activity not found.');
        }
    
        return view('admin.createView.activitySubmisstionCreate', compact('users', 'activity'));
    }
    
    public function storeSubmission(Request $request)
    {
        $request->validate([
            'userId' => 'required|integer',
            'actId' => 'required|integer',
        ]);

        Log::info('User ID: ' . $request->input('userId'));
        Log::info('Activity ID: ' . $request->input('actId'));

        // Fetch the activity to check the registration limit
        $activity = Activity::find($request->input('actId'));
        if (!$activity) {
            return redirect()->back()->with('error', 'ไม่พบกิจกรรมนี้');
        }

        // Count the current submissions for the activity
        $currentSubmissionsCount = ActivitySubmit::where('actId', $request->input('actId'))->count();

        if ($currentSubmissionsCount >= $activity->actRegisLimit) {
            return redirect()->back()->with('error', 'จำนวนการลงทะเบียนสำหรับกิจกรรมนี้เต็มแล้ว');
        }

        // Check if the record already exists
        $existingSubmission = ActivitySubmit::where('userId', $request->input('userId'))
            ->where('actId', $request->input('actId'))
            ->first();

        if ($existingSubmission) {
            return redirect()->back()->with('error', 'กิจกรรมนี้ได้รับการส่งแล้ว');
        }

        // Create the new submission using fill method
        $activitySubmit = new ActivitySubmit();
        $activitySubmit->fill($request->all());
        $activitySubmit->save();

        return redirect()->route('activity.viewSubmissions' , $request->input('actId'))->with('success', 'สมัครกิจกรรมเรียบร้อยแล้ว');
    }
    

    public function editSubmit($id)
    {
        $activitySubmit = ActivitySubmit::findOrFail($id);
        return view('/admin/editView/activitySubmitEdit', compact('activitySubmit'));
    }

    public function updateSubmit(Request $request, $id)
    {
        $activitySubmit = ActivitySubmit::findOrFail($id);

        $request->validate([
            'statusCheckInMorning' => 'nullable|boolean',
            'statusCheckInAfternoon' => 'nullable|boolean',
            'status' => 'nullable|string',
        ]);

        // Update the fields
        $activitySubmit->fill($request->all());

        // Check if both morning and afternoon check-ins are true
        if ($activitySubmit->statusCheckInMorning && $activitySubmit->statusCheckInAfternoon) {
            $activitySubmit->status = 'เข้าร่วมกิจกรรมแล้ว';
        }

        // Save the updated submission
        $activitySubmit->save();
        return back()->with('success', 'อัปเดตการส่งเรียบร้อยแล้ว!');

    }

}
