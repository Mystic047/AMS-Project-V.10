<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;

class adminController extends Controller
{
    public function showManageView()
    {
        $admins = Admin::all();
        return view('/admin/managementView/adminManage' , compact('admins'));
    }

    public function showCreateView()
    {
        return view('/admin/createView/adminCreate');
    }

    public function showEditView($id)
    {
        $admins = Admin::find($id);

        return view('/admin/editView/adminEdit', compact('admins'));
    }


    public function create(Request $request)
    {
        $request->validate([
            // 'admin_id' =>
            'email' => 'nullable|string',
            'password' => 'required|min:8',
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'nickName' => 'nullable|string',
            'areaId' => 'nullable|string',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation rule for the image
        ]);

        Log::debug($request->all());

        $admin = new Admin;
        $admin->fill($request->all());

        $emailPrefix = explode('@', $request->email)[0];
        if (ctype_digit($emailPrefix)) {
            $admin->userId = $emailPrefix;
        } else {

            return back()->withErrors(['email' => 'The student ID must be numeric'])->withInput();
        }

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/admin_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $admin->profilePicture = str_replace('public/', '', $path);  // Save the path in the database
        }
        $admin->save();

        return redirect()->route('admin.manage')->with('success', 'Admin added successfully!');
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

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
            $admin->fill($request->except(['password']));
        } else {
            $admin->fill($request->all());
            $admin->password = $request->password;
        }

        $emailPrefix = explode('@', $request->email)[0];
        if (ctype_digit($emailPrefix)) {
            $admin->admin_id = $emailPrefix;
        } else {
            return back()->withErrors(['email' => 'The admin ID must be numeric'])->withInput();
        }

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/admin_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $admin->profilePicture = str_replace('public/', '', $path); // Save the path in the database
        }

        $admin->save();
        return redirect()->route('admin.manage')->with('success', 'admin updated successfully!');
    }

    public function destroy($id){
        $admin = Admin::find($id)->delete();
        return back()->with('deleted', 'Admin deleted success mfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for coordinators by firstname, lastname, or faculty_id
        $admins = Admin::where('firstName', 'LIKE', "%{$query}%")
            ->orWhere('lastName', 'LIKE', "%{$query}%")
            ->orWhere('userId', 'LIKE', "%{$query}%")
            ->get();

        return view('/admin/managementView/adminManage', compact('admins'));
    }
}
