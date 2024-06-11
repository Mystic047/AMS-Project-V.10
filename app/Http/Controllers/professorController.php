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


    public function showEditView($id)
    {
        $professors = Professor::find($id);
        return view('/admin/editView/professorEdit', compact('professors'));
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

    public function update(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);

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
            $professor->fill($request->except(['password']));
        } else {
            $professor->fill($request->all());
            $professor->password = $request->password;
        }

        $emailPrefix = explode('@', $request->email)[0];
        if (ctype_digit($emailPrefix)) {
            $professor->professors_id = $emailPrefix;
        } else {
            return back()->withErrors(['email' => 'The professor ID must be numeric'])->withInput();
        }

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/professor_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $professor->profile_picture = str_replace('public/', '', $path); // Save the path in the database
        }

        $professor->save();
        return redirect()->route('professor.manage')->with('success', 'professor updated successfully!');
    }

    public function destroy($id){
        $professor = Professor::find($id)->delete();
        return back()->with('deleted', 'Professor deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for coordinators by firstname, lastname, or faculty_id
        $professors = Professor::where('firstname', 'LIKE', "%{$query}%")
            ->orWhere('lastname', 'LIKE', "%{$query}%")
            ->orWhere('professors_id', 'LIKE', "%{$query}%")
            ->get();

        return view('/admin/managementView/professorManage', compact('professors'));
    }
}
