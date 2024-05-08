<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\activity_coordinators;

class coordinatorController extends Controller
{
    public function showManageView()
    {
        return view('/admin/managementView/activitycoordinatorsManage');
    }

    public function showCreateView()
    {
        return view('/admin/createView/activitycoordinatorsCreate');
    }


    public function create(Request $request)
    {
        $request->validate([
            // 'ac_id' => 'required|unique:activity_coordinators,ac_id',
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

        $coordinator = new activity_coordinators;
        $coordinator->fill($request->all());

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/coordinator_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $coordinator->profile_picture = $path; // Save the path in the database
        }
        $coordinator->save();

        return redirect()->route('coordinator.manage')->with('success', 'coordinator added successfully!');
    }

}
