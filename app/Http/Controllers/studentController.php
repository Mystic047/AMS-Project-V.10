<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Student;

class studentController extends Controller
{
    public function showManageView()
    {
        $students = Student::all();
        return view('/admin/managementView/studentManage', compact('students'));
    }

    public function showCreateView()
    {
        return view('/admin/createView/studentCreate' );
    }

    public function showEditView($id)
    {
        $students = Student::find($id);
        return view('/admin/editView/studentEdit' , compact('students'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => 'nullable|string',
            'password' => 'required|min:8',
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'nickName' => 'nullable|string',
            'areaId' => 'nullable|string',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation rule for the image
        ]
        );

        Log::debug($request->all());

        $student = new Student;
        $student->fill($request->all());

        $emailPrefix = explode('@', $request->email)[0];
        if (ctype_digit($emailPrefix)) {
            $student->userId = $emailPrefix;
        } else {

            return back()->withErrors(['email' => 'The student ID must be numeric'])->withInput();
        }

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/student_profiles', $filename);
            $student->profilePicture = str_replace('public/', '', $path);
        }



        $student->save();

        return redirect()->route('student.manage')->with('success', 'Students added successfully!');
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'email' => 'nullable|string',
            'password' => 'nullable|min:8',
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'nickName' => 'nullable|string',
            'areaId' => 'nullable|string',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation rule for the image
        ]);

        Log::debug($request->all());

        if (empty($request->password)) {
            $student->fill($request->except(['password']));
        } else {
            $student->fill($request->all());
            $student->password = $request->password;
        }

        $emailPrefix = explode('@', $request->email)[0];
        if (ctype_digit($emailPrefix)) {
            $student->userId = $emailPrefix;
        } else {
            return back()->withErrors(['email' => 'The student ID must be numeric'])->withInput();
        }

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/student_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $student->profilePicture = str_replace('public/', '', $path); // Save the path in the database
        }

        $student->save();
        return redirect()->route('student.manage')->with('success', 'student updated successfully!');
    }

    public function destroy($id){
        $student = Student::find($id)->delete();
        return back()->with('deleted', 'Student deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for coordinators by firstname, lastname, or faculty_id
        $students = Student::where('firstName', 'LIKE', "%{$query}%")
            ->orWhere('lastName', 'LIKE', "%{$query}%")
            ->orWhere('userId', 'LIKE', "%{$query}%")
            ->get();

        return view('/admin/managementView/studentManage', compact('students'));
    }

}
