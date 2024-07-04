<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Activities;
use Illuminate\Http\Request;
use App\Models\ActivitiesSubmit;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class activityController extends Controller
{
    public function showManageView()
    {
        $activities = Activities::all();
        return view('/admin/managementView/activityManage', compact('activities'));
    }

    public function showCreateView()
    {
        return view('/admin/createView/activityCreate');
    }

    public function showEditView($id)
    {
        $activities = Activities::find($id);

        return view('/admin/editView/activityEdit', compact('activities'));
    }

    public function showInfo($id)
    {
        $activities = Activities::find($id);

        return view('/admin/editView/activityEdit', compact('activities'));
    }

    public function create(Request $request)
    {
        Log::info('Request received for creating activity.', $request->all());

        $validatedData = $request->validate([
            'activity_id' => 'required|string',
            'activity_name' => 'required|string',
            'activity_type' => 'required|string',
            'activity_date' => 'required|date',
            'activity_responsible_branch' => 'required|string',
            'activity_hour_earned' => 'required|string',
            'activity_register_limit' => 'required|string',
            'activity_detail' => 'required|string',
            'assessment_link' => 'required|url',
            'activity_location' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'responsible_person' => 'required|string',
        ]);

        Log::info('Validation passed.', $validatedData);

        $activity = new Activities();
        $activity->fill($validatedData);

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/activity_pictures', $filename);
            $activity->picture = str_replace('public/', '', $path);
        }

        // if ($request->hasFile('profile_picture')) {
        //     $file = $request->file('profile_picture');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $path = $file->storeAs('public/profile_pictures/admin_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
        //     $admin->profile_picture = str_replace('public/', '', $path); // Save the path in the database
        // }

        $activity->save();

        Log::info('Activity saved successfully.', $activity->toArray());

        return redirect()->route('activity.manage')->with('success', 'Activity added successfully!');
    }

    public function update(Request $request, $id)
    {
        $activity = Activities::findOrFail($id);

        $validatedData = $request->validate([
            'activity_id' => 'required|string',
            'activity_name' => 'required|string',
            'activity_type' => 'required|string',
            'activity_date' => 'required|date',
            'activity_responsible_branch' => 'required|string',
            'activity_hour_earned' => 'required|string',
            'activity_register_limit' => 'required|string',
            'activity_detail' => 'required|string',
            'activity_location' => 'required|string',
            'assessment_link' => 'required|url',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'responsible_person' => 'required|string',
        ]);

        Log::info('Validation passed.', $validatedData);

        $activity->fill($validatedData);

        // Handle the picture upload
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/activity_pictures', $filename);
            $activity->picture = str_replace('public/', '', $path);
        }

        // Save the updated activity
        $activity->save();

        return redirect()->route('activity.manage')->with('success', 'Activity edited successfully!');
    }

    public function destroy($id)
    {
        $activity = Activities::find($id)->delete();
        return back()->with('deleted', 'Activity deleted success fully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for coordinators by firstname, lastname, or faculty_id
        $activity = Activities::where('firstname', 'LIKE', "%{$query}%")
            ->orWhere('lastname', 'LIKE', "%{$query}%")
            ->orWhere('admin_id', 'LIKE', "%{$query}%")
            ->get();

        return view('/admin/managementView/adminManage', compact('activity'));
    }
    public function toggleStatus($id, Request $request)
    {
        $activity = Activities::findOrFail($id);
        $activity->is_open = $request->input('is_open') ? true : false;
        $activity->save();

        return response()->json(['success' => true]);
    }

    public function generatePDF($id)
    {
        $activity = Activities::find($id);

        if (!$activity) {
            return redirect()->back()->with('error', 'Activity not found.');
        }

        $activitiesSubmits = ActivitiesSubmit::with(['student.area'])
            ->where('activity_id', $id)
            ->get();

        // Log the data for debugging
        Log::info('Activity:', [$activity]);
        Log::info('Activities Submits:', [$activitiesSubmits]);

        $html = View::make('pdf.activity', compact('activity', 'activitiesSubmits'))->render();
        $pdf = PDF::loadHTML($html);

        return $pdf->stream('activity-submits.pdf');
    }


}
