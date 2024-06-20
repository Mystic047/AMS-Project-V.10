<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Activities;
class activityController extends Controller
{
    public function showManageView()
    {
        $activities = Activities::all();
        return view('/admin/managementView/activityManage' , compact('activities'));
    }

    public function showCreateView()
    {
        return view('/admin/createView/activityreate');
    }

    public function showEditView($id)
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
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'activity_hour_earned' => 'required|string',
            'activity_register_limit' => 'required|string',
            'activity_detail' => 'required|string',
            'assessment_link' => 'required|url',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'created_by' => 'required|string',
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
        $admin = Admin::findOrFail($id);

        $request->validate([
            'email' => 'nullable|string',
            'password' => 'nullable|string',
            'firstname' => 'nullable|string',
            'lastname' => 'nullable|string',
            'nickname' => 'nullable|string',
            'faculty_id' => 'nullable|string',
            'area_id' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Log::debug($request->all());

        if (empty($request->password)) {
            $admin->fill($request->except(['password']));
        } else {
            $admin->fill($request->all());
            $admin->password = $request->password;
        }

        $emailPrefix = explode('@', $request->email)[0];
        if (ctype_digit($emailPrefix)) {
            $admin->admin_id = $emailPrefix;
        } else {
            return back()->withErrors(['email' => 'The admin ID must be numeric'])->withInput();
        }

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/admin_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $admin->profile_picture = str_replace('public/', '', $path); // Save the path in the database
        }

        $admin->save();
        return redirect()->route('admin.manage')->with('success', 'admin updated successfully!');
    }

    public function destroy($id){
        $admin = Admin::find($id)->delete();
        return back()->with('deleted', 'Admin deleted success mfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for coordinators by firstname, lastname, or faculty_id
        $admins = Admin::where('firstname', 'LIKE', "%{$query}%")
            ->orWhere('lastname', 'LIKE', "%{$query}%")
            ->orWhere('admin_id', 'LIKE', "%{$query}%")
            ->get();

        return view('/admin/managementView/adminManage', compact('admins'));
    }
}
