<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\professors;

class professorController extends Controller
{
    public function showManageView()
    {
        return view('/admin/managementView/professorManage');
    }

    public function showCreateView()
    {
        return view('/admin/createView/professorCreate');
    }

    public function create(Request $request)
    {
        $request->validate([
            // 'professors_id' => 'required|unique:professors,professors_id',
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

        $professor = new professors;
        $professor->fill($request->all());

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/professor_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $professor->profile_picture = $path; // Save the path in the database
        }
        $professor->save();

        return redirect()->route('professor.manage')->with('success', 'Professor added successfully!');
    }

}
