<?php

namespace App\Http\Controllers;

use App\Models\FileForDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class fileController extends Controller
{
    public function showManageView()
    {
        $files = FileForDownload::all();
        return view('/admin/managementView/fileManage', compact('files'));
    }
    public function showManageView2()
    {
        $files = FileForDownload::all();
        return view('filedowload', compact('files'));
    }

    public function showCreateView()
    {
        return view('/admin/createView/fileCreate');
    }

    public function showUploadView()
    {
        return view('fileupload');
    }

    public function showEditView($id)
    {
        $files = FileForDownload::find($id);

         return view('/admin/editView/fileEdit', compact('files'));
    }

    public function upload(Request $request)
    {
        try {
            $request->validate([
                'fileName' => 'nullable|string',
                'filePath' => 'nullable|mimes:pdf,jpeg,png|max:2048',
            ]);
    
            Log::debug($request->all());
            $file = new FileForDownload;
            $file->fill($request->all());
    
            if ($request->hasFile('filePath')) {
                $uniqueFileName = uniqid() . '.' . $request->file('filePath')->getClientOriginalExtension();
                $pdfPath = $request->file('filePath')->storeAs('public/fileForDownload', $uniqueFileName);
                $file->filePath = $pdfPath;
            }
    
            $file->save();
            return redirect()->route('file.manage2')->with('success', 'เพิ่มไฟล์สําเร็จ!');
        } catch (\Exception $e) {
            Log::error('File creation error: '.$e->getMessage());
            return redirect()->back()->with('error', 'มีปัญหาในการเพิ่มไฟล์ กรุณาลองใหม่อีกครั้ง');
        }
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'fileName' => 'nullable|string',
                'filePath' => 'nullable|mimes:pdf,jpeg,png|max:2048',
            ]);
    
            Log::debug($request->all());
            $file = new FileForDownload;
            $file->fill($request->all());
    
            if ($request->hasFile('filePath')) {
                $uniqueFileName = uniqid() . '.' . $request->file('filePath')->getClientOriginalExtension();
                $pdfPath = $request->file('filePath')->storeAs('public/fileForDownload', $uniqueFileName);
                $file->filePath = $pdfPath;
            }
    
            $file->save();
            return back()->with('success', 'เพิ่มไฟล์สําเร็จ!');
        } catch (\Exception $e) {
            Log::error('File creation error: '.$e->getMessage());
            return redirect()->back()->with('error', 'มีปัญหาในการเพิ่มไฟล์ กรุณาลองใหม่อีกครั้ง');
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'fileName' => 'nullable|string',
                'filePath' => 'nullable|mimes:pdf,jpeg,png|max:2048',
            ]);
    
            Log::debug($request->all());
            $file = FileForDownload::findOrFail($id);
            $file->fileName = $request->input('fileName');
    
            if ($request->hasFile('filePath')) {
                if ($file->filePath) {
                    Storage::delete($file->filePath);
                }
                $uniqueFileName = uniqid() . '.' . $request->file('filePath')->getClientOriginalExtension();
                $pdfPath = $request->file('filePath')->storeAs('public/fileForDownload', $uniqueFileName);
                $file->filePath = $pdfPath;
            }
    
            $file->save();
            return back()->with('success', 'อัพเดทไฟล์สําเร็จ!');
        } catch (\Exception $e) {
            Log::error('File update error: '.$e->getMessage());
            return redirect()->back()->with('error', 'มีปัญหาในการอัพเดทไฟล์ กรุณาลองใหม่อีกครั้ง');
        }
    }
    
    
    public function destroy($id)
    {
        $file = FileForDownload::findOrFail($id);

        if ($file->filePath) {
            Storage::delete($file->filePath);
        }

        $file->delete();

        return redirect()->back()->with('success', 'ลบไฟล์สําเร็จ!');
    }
}
