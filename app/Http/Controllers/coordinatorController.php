<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Coordinator;

class coordinatorController extends Controller
{
    public function showManageView()
    {
        $coordinators = Coordinator::all();
        return view('/admin/managementView/activitycoordinatorsManage' , compact('coordinators'));
    }

    public function showCreateView()
    {
        return view('/admin/createView/activitycoordinatorsCreate');
    }


    public function create(Request $request)
    {
        $request->validate([
            // 'coordinators_id' => 'required|unique:activity_coordinators,coordinators_id',
            'email' => 'nullable|string',
            'password' => 'required|min:8',
            'firstname' => 'nullable|string',
            'lastname' => 'nullable|string',
            'nickname' => 'nullable|string',
            'faculty_id' => 'nullable|string',
            'area_id' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation rule for the image
        ]);

        Log::debug($request->all());

        $coordinator = new Coordinator;
        $coordinator->fill($request->all());

        $emailPrefix = explode('@', $request->email)[0];
        if (ctype_digit($emailPrefix)) { 
            $coordinator->coordinators_id = $emailPrefix;
        } else {
            
            return back()->withErrors(['email' => 'The student ID must be numeric'])->withInput();
        }
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/coordinator_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $coordinator->profile_picture = str_replace('public/', '', $path); // Save the path in the database
        }
        $coordinator->save();

        return redirect()->route('coordinator.manage')->with('success', 'coordinator added successfully!');
    }

}
