<?php

namespace App\Http\Controllers;

use App\Models\Area;
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
        $area = Area::all();
        return view('/admin/createView/activitycoordinatorsCreate', compact('area'));
    }

    public function showEditView($id)
    {
        $coordinators = Coordinator::find($id);
        return view('/admin/editView/activitycoordinatorsEdit', compact('coordinators'));
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

        $coordinator = new Coordinator;
        $coordinator->fill($request->all());

        $emailPrefix = explode('@', $request->email)[0];
        if (ctype_digit($emailPrefix)) {
            $coordinator->userId = $emailPrefix;
        } else {
            return back()->with(['error' => 'รหัสฝ่ายกิจกรรมต้องเป็นตัวเลข'])->withInput();
        }

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures/coordinator_profiles', $filename); // Save the file in the storage/app/public/profile_pictures directory
            $coordinator->profilePicture = str_replace('public/', '', $path); // Save the path in the database
        }

        $coordinator->save();

        return back()->with('success', 'ข้อมูลฝ่ายกิจกรรมเพิ่มเรียบร้อย!');
    }

    public function update(Request $request, $id)
    {
        try {
            $coordinator = Coordinator::findOrFail($id);

            $validatedData = $request->validate([
                'email' => 'nullable|string|email',
                'password' => 'nullable|min:8',
                'firstName' => 'nullable|string',
                'lastName' => 'nullable|string',
                'nickName' => 'nullable|string',
                'areaId' => 'nullable|string',
                'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            Log::debug($request->all());

            if (empty($request->password)) {
                $coordinator->fill($request->except(['password']));
            } else {
                $coordinator->fill($validatedData);
                $coordinator->password = $request->password;
            }

            $emailPrefix = explode('@', $request->email)[0];
            if (ctype_digit($emailPrefix)) {
                $coordinator->userId = $emailPrefix;
            } else {
                return back()->withErrors(['email' => 'รหัสฝ่ายกิจกรรมต้องเป็นตัวเลข'])->withInput();
            }

            if ($request->hasFile('profilePicture')) {
                // Delete the old profile picture if it exists
                if ($coordinator->profilePicture && Storage::exists('public/' . $coordinator->profilePicture)) {
                    Storage::delete('public/' . $coordinator->profilePicture);
                }

                $file = $request->file('profilePicture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/profile_pictures/coordinator_profiles', $filename);
                $coordinator->profilePicture = str_replace('public/', '', $path);
            }

            $coordinator->save();

            return redirect()->route('coordinator.edit', ['id' => $coordinator->userId])
                ->with('success', 'อัพเดทข้อมูลฝ่ายกิจกรรมสําเร็จ!');
        } catch (\Exception $e) {
            Log::error('Failed to update coordinator: ' . $e->getMessage());
            return back()->with('error', 'ไม่สามารถอัพเดทข้อมูลฝ่ายกิจกรรมได้ โปรดลองอีกครั้ง')->withInput();
        }
    }

    public function destroy($id)
    {
        $coordinator = Coordinator::findOrFail($id);

        // Delete the profile picture if it exists
        if ($coordinator->profilePicture && Storage::exists('public/' . $coordinator->profilePicture)) {
            Storage::delete('public/' . $coordinator->profilePicture);
        }

        $coordinator->delete();

        return back()->with('success', 'ลบข้อมูลฝ่ายกิจกรรมสําเร็จ!');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for coordinators by firstname, lastname, or faculty_id
        $coordinators = Coordinator::where('firstName', 'LIKE', "%{$query}%")
            ->orWhere('lastName', 'LIKE', "%{$query}%")
            ->orWhere('userId', 'LIKE', "%{$query}%")
            ->get();

        return view('/admin/managementView/activitycoordinatorsManage', compact('coordinators'));
    }
}
