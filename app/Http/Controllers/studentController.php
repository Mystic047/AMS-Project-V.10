<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Student;

class studentController extends Controller
{
    public function showManageView()
    {
        return view('/admin/managementView/studentManage');
    }

    public function showCreateView()
    {
        return view('/admin/createView/studentCreate');
    }

    public function create(Request $request)
    {
        $request->validate([
            // 'students_id' => 'required|unique:students,students_id',
            'email' => 'required|nullable|string',
            'password' => 'required|min:4',  //need to change later to min 8
            'firstname' => 'required|nullable|string',
            'lastname' => 'required|nullable|string',
            'nickname' => 'required|nullable|string',
            'faculty_id' => 'required|nullable|string',
            'area_id' => 'required|nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation rule for the image
        ]
        );

        Log::debug($request->all());

        $student = new Student;
        $student->fill($request->all());

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/student_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $student->profile_picture = $path; // Corrected variable
        }


        $student->save();

        return redirect()->route('student.manage')->with('success', 'Students added successfully!');
    }
}
