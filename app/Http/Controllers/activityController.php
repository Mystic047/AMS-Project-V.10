<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\ActivitySubmit;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class activityController extends Controller
{
    public function showManageView()
    {
        $activities = Activity::all();
        return view('/admin/managementView/activityManage', compact('activities'));
    }

    public function showManageViewFront()
    {
        $activities = Activity::all();
        return view('activityManage', compact('activities'));
    }

    public function showCreateView()
    {
        return view('/admin/createView/activityCreate');
    }


    public function showCreateViewFront()
    {
        return view('activityCreate');
    }

    public function showEditView($id)
    {
        $activities = Activity::find($id);

        return view('/admin/editView/activityEdit', compact('activities'));
    }

    public function showEditViewFront($id)
    {
        $activities = Activity::find($id);

        return view('activityEdit', compact('activities'));
    }
    
    public function showInfo($id)
    {
        $activities = Activity::find($id);

        return view('/admin/editView/activityEdit', compact('activities'));
    }

    public function create(Request $request)
    {
        Log::info('Request received for creating activity.', $request->all());

        $validatedData = $request->validate([
            'actId' => 'required|string',
            'actName' => 'required|string',
            'actType' => 'required|string',
            'actDate' => 'required|date',
            'actResBranch' => 'required|string',
            'actHour' => 'required|string',
            'actRegisLimit' => 'required|string',
            'actDetails' => 'required|string',
            'assessmentLink' => 'required|url',
            'actLocation' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'responsiblePerson' => 'required|string',
        ]);

        Log::info('Validation passed.', $validatedData);

        $activity = new Activity();
        $activity->fill($validatedData);

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/activity_pictures', $filename);
            $activity->picture = str_replace('public/', '', $path);
        }


        $activity->save();

        Log::info('Activity saved successfully.', $activity->toArray());

        // return redirect()->route('activity.manage')->with('success', 'Activity added successfully!');
        return back()->with('success', 'Activity added success fully!');
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        $validatedData = $request->validate([
            'actName' => 'required|string',
            'actType' => 'required|string',
            'actDate' => 'required|date',
            'actResBranch' => 'required|string',
            'actHour' => 'required|string',
            'actRegisLimit' => 'required|string',
            'actDetails' => 'required|string',
            'actLocation' => 'required|string',
            'assessmentLink' => 'required|url',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'responsiblePerson' => 'required|string',
            'isOpen' => 'nullable|boolean',

        ]);

        Log::info('Validation passed.', $validatedData);

        $activity->fill($validatedData);

     
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/activity_pictures', $filename);
            $activity->picture = str_replace('public/', '', $path);
        }


        $activity->save();

        // return redirect()->route('activity.manage')->with('success', 'Activity edited successfully!');
        return back()->with('success', 'Activity edited success fully!');
    }

    public function destroy($id)
    {
        $activity = Activity::find($id)->delete();
        return back()->with('deleted', 'Activity deleted success fully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for coordinators by firstname, lastname, or faculty_id
        $activity = Activity::where('firstName', 'LIKE', "%{$query}%")
            ->orWhere('lastName', 'LIKE', "%{$query}%")
            ->orWhere('adminId', 'LIKE', "%{$query}%")
            ->get();

        return view('/admin/managementView/adminManage', compact('activity'));
    }
    
    public function toggleStatus(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->isOpen = $request->input('isOpen');
        $activity->save();
    
        return response()->json(['success' => true]);
    }
    
    

    public function generatePDF($id)
    {
        $activity = Activity::find($id);

        if (!$activity) {
            return redirect()->back()->with('error', 'Activity not found.');
        }

        $activitiesSubmits = ActivitySubmit::with(['student.area'])
            ->where('actId', $id)
            ->get();

        // Log the data for debugging
        Log::info('Activity:', [$activity]);
        Log::info('Activities Submits:', [$activitiesSubmits]);

        $html = View::make('pdf.activity', compact('activity', 'activitiesSubmits'))->render();
        $pdf = PDF::loadHTML($html);

        return $pdf->stream('activity-submits.pdf');
    }


}
