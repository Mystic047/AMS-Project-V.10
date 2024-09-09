<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class facultyController extends Controller
{
    public function showManageView()
    {
        $areas = Area::all();
        $facultys = Faculty::all();
        return view('/admin/managementView/faculty-areaManage', compact('areas', 'facultys'));
    }
    

    public function showCreateView()
    {
     
        return view('/admin/createView/facultyCreate');
    }

    public function showEditView($id)
    {
        $facultys = Faculty::find($id);
        return view('/admin/editView/facultyEdit' , compact('facultys'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'facultyId' => 'required|string',
            'facultyName' => 'required|string', 
        ]
        );
        Log::debug($request->all());

        $facultys = new Faculty;
        $facultys->fill($request->all());

    
        $facultys->save();

        return redirect()->route('faculty.manage')->with('success', 'เพิ่มข้อมูลคณะสําเร็จ!');
    }

    public function update(Request $request, $id)
    {
        $facultys = Faculty::findOrFail($id);

        $request->validate([
            'facultyId' => 'required|string',
            'facultyName' => 'required|string',  
        ]);

        $facultys->fill($request->all());

        Log::debug($request->all());


        $facultys->save();
        return redirect()->route('faculty.manage')->with('success', 'อัพเดทข้อมูลคณะสําเร็จ!');
    }

    public function destroy($id){
        $request = Faculty::find($id)->delete();
        return back()->with('deleted', 'ลบข้อมูลคณะสําเร็จ!');
    }
}
