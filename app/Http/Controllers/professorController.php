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
            'email' => 'nullable|string',
            'password' => 'required|min:8',
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'nickName' => 'nullable|string',
            'areaId' => 'nullable|string',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation rule for the image
        ]);

        Log::debug($request->all());

        $professor = new Professor;
        $professor->fill($request->all());

        $emailPrefix = explode('@', $request->email)[0];
        if (ctype_digit($emailPrefix)) {
            $professor->userId = $emailPrefix;
        } else {

            return back()->withErrors(['email' => 'The professor ID must be numeric'])->withInput();
        }

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/professor_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $professor->profilePicture = str_replace('public/', '', $path);
        }
        $professor->save();

        return redirect()->route('professor.manage')->with('success', 'Professor added successfully!');
    }

    public function update(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);

        $request->validate([
            'email' => 'nullable|string',
            'password' => 'required|min:8',
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'nickName' => 'nullable|string',
            'areaId' => 'nullable|string',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation rule for the image
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
            $professor->userId = $emailPrefix;
        } else {
            return back()->withErrors(['email' => 'The professor ID must be numeric'])->withInput();
        }

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/professor_profiles', $filename); 
            $professor->profilePicture = str_replace('public/', '', $path); 
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

        
        $professors = Professor::where('firstName', 'LIKE', "%{$query}%")
            ->orWhere('lastName', 'LIKE', "%{$query}%")
            ->orWhere('userId', 'LIKE', "%{$query}%")
            ->get();

        return view('/admin/managementView/professorManage', compact('professors'));
    }
}
