<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileForDownload;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class fileController extends Controller
{
    public function showManageView()
    {
        $files = FileForDownload::all();
        return view('/admin/managementView/fileManage', compact('files'));
    }

    public function showCreateView()
    {
        return view('/admin/createView/fileCreate');
    }

    public function showEditView($id)
    {
        $file = FileForDownload::find($id);

        // return view('/admin/editView/adminEdit', compact('admins'));
    }

    public function create(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'fileName' => 'nullable|string',
            'file_path' => 'nullable|mimes:pdf|max:2048',
        ]);

        Log::debug($request->all());
        $file = new FileForDownload;
        $file->fill($request->all());

        if ($request->hasFile('file_path')) {
            $uniqueFileName = uniqid() . '.' . $request->file('file_path')->getClientOriginalExtension();
            $pdfPath = $request->file('file_path')->storeAs('public/fileForDownload', $uniqueFileName);
            $file->file_path = $pdfPath;
        }
        // $authUser = getAuthenticatedUser();
        // if ($authUser) {
        //     $file->created_by = $authUser->id;
        //     $file->created_by_role = $authUser->role;
        // }
        $file->save();
        return redirect()->route('file.manage')->with('success', 'File added successfully!');
    }

    public function destroy($id)
    {
        $file = FileForDownload::findOrFail($id);

        if ($file->file_path) {
            Storage::delete($file->file_path);
        }

        $file->delete();

        return redirect()->route('file.manage')->with('success', 'File deleted successfully!');
    }
}
