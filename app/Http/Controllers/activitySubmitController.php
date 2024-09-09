<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivitySubmit;
use Illuminate\Http\Request;
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
        $request->validate([
            'actSubmitId' => 'required|exists:activitySubmit,actSubmitId',
            'code' => 'required|string',
            'session' => 'required|in:morning,afternoon',
        ]);

        $actSubmit = ActivitySubmit::find($request->actSubmitId);

        if ($actSubmit->checkIn($request->code, $request->session)) {
            return back()->with('success', 'เช็คอินสำเร็จ!');
        } else {
            return back()->with('error', 'รหัสการเข้าร่วมหรือเซสชันไม่ถูกต้อง.');
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
        return view('/admin/activitySubmit/activitySubmissions', compact('activitySubmits' , 'actId'));
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
