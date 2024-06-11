<?php

namespace App\Http\Controllers;

use App\Models\Coordinator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class coordinatorController extends Controller
{
    public function showManageView()
    {
        $coordinators = Coordinator::all();
        return view('/admin/managementView/activitycoordinatorsManage', compact('coordinators'));
    }

    public function showCreateView()
    {
        return view('/admin/createView/activitycoordinatorsCreate');
    }

    public function showEditView($id)
    {
        $coordinators = Coordinator::find($id);
        return view('/admin/editView/activitycoordinatorsEdit', compact('coordinators'));
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

    public function update(Request $request, $id)
    {
        $coordinator = Coordinator::findOrFail($id);

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
            $coordinator->fill($request->except(['password']));
        } else {
            $coordinator->fill($request->all());
            $coordinator->password = $request->password;
        }

        $emailPrefix = explode('@', $request->email)[0];
        if (ctype_digit($emailPrefix)) {
            $coordinator->coordinators_id = $emailPrefix;
        } else {
            return back()->withErrors(['email' => 'The coordinator ID must be numeric'])->withInput();
        }

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/coordinator_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $coordinator->profile_picture = str_replace('public/', '', $path); // Save the path in the database
        }

        $coordinator->save();
        return redirect()->route('coordinator.manage')->with('success', 'Coordinator updated successfully!');
    }

    public function destroy($id)
    {
        $coordinator = Coordinator::find($id)->delete();
        return back()->with('deleted', 'Coordinator deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for coordinators by firstname, lastname, or faculty_id
        $coordinators = Coordinator::where('firstname', 'LIKE', "%{$query}%")
            ->orWhere('lastname', 'LIKE', "%{$query}%")
            ->orWhere('coordinators_id', 'LIKE', "%{$query}%")
            ->get();


        return view('/admin/managementView/activitycoordinatorsManage', compact('coordinators'));
    }
}
