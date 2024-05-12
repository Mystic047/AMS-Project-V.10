<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Professor;

class professorController extends Controller
{
    public function showManageView()
    {
        $professors = Professor::all();
        return view('/admin/managementView/professorManage' , compact('professors'));
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

        $professor = new Professor;
        $professor->fill($request->all());

        $emailPrefix = explode('@', $request->email)[0];
        if (ctype_digit($emailPrefix)) { 
            $professor->professors_id = $emailPrefix;
        } else {
            
            return back()->withErrors(['email' => 'The student ID must be numeric'])->withInput();
        }

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/professor_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $professor->profile_picture = str_replace('public/', '', $path); 
        }
        $professor->save();

        return redirect()->route('professor.manage')->with('success', 'Professor added successfully!');
    }

}
