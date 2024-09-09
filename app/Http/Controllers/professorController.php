<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class professorController extends Controller
{
    public function showManageView()
    {
        $professors = Professor::all();
        return view('/admin/managementView/professorManage', compact('professors'));
    }

    public function showCreateView()
    {
        $area = Area::all();
        return view('/admin/createView/professorCreate', compact('area'));
    }

    public function showEditView($id)
    {
        $professors = Professor::find($id);
        return view('/admin/editView/professorEdit', compact('professors'));
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
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $professor = new Professor;
            $professor->fill($validatedData);

            $emailPrefix = explode('@', $request->email)[0];
            if (ctype_digit($emailPrefix)) {
                $professor->userId = $emailPrefix;
            } else {
                return back()->withErrors(['email' => 'รหัสอาจารย์ต้องเป็นตัวเลข'])->withInput();
            }

            if ($request->hasFile('profilePicture')) {
                $file = $request->file('profilePicture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/profile_pictures/professor_profiles', $filename);
                $professor->profilePicture = str_replace('public/', '', $path);
            }

            $professor->save();

            return back()->with('success', 'เพิ่มข้อมูลอาจารย์สําเร็จ!');
        } catch (\Exception $e) {
            Log::error('Failed to add professor: ' . $e->getMessage());
            return back()->with('error', 'เกิดข้อผิดพลาดในการเพิ่มข้อมูลอาจารย์')->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $professors = Professor::findOrFail($id);

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
                $professors->fill($request->except(['password']));
            } else {
                $professors->fill($validatedData);
                $professors->password = $request->password;
            }

            $emailPrefix = explode('@', $request->email)[0];
            if (ctype_digit($emailPrefix)) {
                $professors->userId = $emailPrefix;
            } else {
                return back()->with(['error' => 'รหัสอาจารย์ต้องเป็นตัวเลข'])->withInput();
            }

            if ($request->hasFile('profilePicture')) {
                // Delete the old profile picture if it exists
                if ($professors->profilePicture && Storage::exists('public/' . $professors->profilePicture)) {
                    Storage::delete('public/' . $professors->profilePicture);
                }

                $file = $request->file('profilePicture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/profile_pictures/professor_profiles', $filename);
                $professors->profilePicture = str_replace('public/', '', $path);
            }

            $professors->save();

            return redirect()->route('professor.edit', ['id' => $professors->userId])
                             ->with('success', 'อัพเดทข้อมูลอาจารย์สําเร็จ!');
        } catch (\Exception $e) {
            Log::error('Failed to update professor: ' . $e->getMessage());
            return back()->with('error', 'เกิดข้อผิดพลาดในการอัพเดทข้อมูลอาจารย์')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $professors = Professor::findOrFail($id);

            // Delete the profile picture if it exists
            if ($professors->profilePicture && Storage::exists('public/' . $professors->profilePicture)) {
                Storage::delete('public/' . $professors->profilePicture);
            }

            $professors->delete();

            return back()->with('success', 'ลบข้อมูลอาจารย์สําเร็จ!');
        } catch (\Exception $e) {
            Log::error('Failed to delete professor: ' . $e->getMessage());
            return back()->with('error', 'เกิดข้อผิดพลาดในการลบข้อมูลอาจารย์')->withInput();
        }
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
