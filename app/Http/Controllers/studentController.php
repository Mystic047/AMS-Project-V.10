<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class studentController extends Controller
{
    public function showManageView()
    {
        $students = Student::all();
        return view('/admin/managementView/studentManage', compact('students'));
    }

    public function showCreateView()
    {
        $area = Area::all();
        return view('/admin/createView/studentCreate', compact('area'));
    }

    public function showEditView($id)
    {
        $students = Student::find($id);
        return view('/admin/editView/studentEdit', compact('students'));
    }

    public function create(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'email' => 'nullable|string|email',
            'password' => 'required|min:8',
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'nickName' => 'nullable|string',
            'areaId' => 'nullable|string',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation rule for the image
        ]);
    
        try {
            $student = new Student;
            $student->fill($validatedData);
    
            $emailPrefix = explode('@', $request->email)[0];
            if (ctype_digit($emailPrefix)) {
                $student->userId = $emailPrefix;
            } else {
                return back()->withErrors(['email' => 'รหัสนักศึกษาต้องเป็นตัวเลข'])->withInput();
            }
    
            // Handle profile picture upload or use default
            if ($request->hasFile('profilePicture')) {
                $file = $request->file('profilePicture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/profile_pictures/student_profiles', $filename);
                $student->profilePicture = str_replace('public/', '', $path);
            }
    
            $student->save();
    
            return back()->with('success', 'เพิ่มนักศึกษาสําเร็จ!');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to add student: ' . $e->getMessage());
    
            return back()->with('error', 'เกิดข้อผิดพลาดในการเพิ่มนักศึกษา')->withInput();
        }
    }
    

    public function update(Request $request, $id)
    {
        try {
            $student = Student::findOrFail($id);
    
            $validatedData = $request->validate([
                'email' => 'nullable|string|email',
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
                $student->fill($validatedData);
                $student->password = $request->password;
            }
    
            $emailPrefix = explode('@', $request->email)[0];
            if (ctype_digit($emailPrefix)) {
                $student->userId = $emailPrefix;
            } else {
                return back()->with('error', 'รหัสนักศึกษาต้องเป็นตัวเลข')->withInput();
            }
    
            if ($request->hasFile('profilePicture')) {
                // Delete the old profile picture if it exists
                if ($student->profilePicture && Storage::exists('public/' . $student->profilePicture)) {
                    Storage::delete('public/' . $student->profilePicture);
                }
    
                $file = $request->file('profilePicture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/profile_pictures/student_profiles', $filename);
                $student->profilePicture = str_replace('public/', '', $path);
            }
    
            $student->save();
    
            return redirect()->route('student.edit', ['id' => $student->userId])
                             ->with('success', 'อัพเดทข้อมูลนักศึกษาสําเร็จ!');
        } catch (\Exception $e) {
            Log::error('Failed to update student: ' . $e->getMessage());
            return back()->with('error', 'เกิดข้อผิดพลาดในการอัพเดทข้อมูลนักศึกษา')->withInput();
        }
    }
    

    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);

            // Delete the student's profile picture if it exists
            if ($student->profilePicture && Storage::exists('public/' . $student->profilePicture)) {
                Storage::delete('public/' . $student->profilePicture);
            }

            $student->delete();

            return back()->with('success', 'ลบข้อมูลนักศึกษาสําเร็จ!');
        } catch (\Exception $e) {
            Log::error('Failed to delete student: ' . $e->getMessage());
            return back()->with('error', 'เกิดข้อผิดพลาดในการลบข้อมูลนักศึกษา')->withInput();
        }
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
