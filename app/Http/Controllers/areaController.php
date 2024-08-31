<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class areaController extends Controller
{
    public function showManageView()
    {
        $areas = Area::all();
        $facultys = Faculty::all();
        return view('/admin/managementView/faculty-areaManage', compact('areas', 'facultys'));
    }
    

    public function showCreateView()
    {
           $facultys = Faculty::all();
        return view('/admin/createView/areaCreate' , compact('facultys'));
    }

    public function showEditView($id)
    {
        $areas = Area::find($id);
        return view('/admin/editView/areaEdit' , compact('areas'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'areaId' => 'required|string|unique:area,areaId',
            'areaName' => 'required|string',
            'facultyId' => 'required|string',
        ]);
    
        Log::debug($request->all());
    
        $area = new Area;
        $area->fill($request->all());
        
        $area->save();
    
        return redirect()->route('area.manage')->with('success', 'Area added successfully!');
    }
    

    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);

        $request->validate([
            'areaId' => 'nullable|string',
            'areaName' => 'required|string',  
            'facultyId' => 'required|string',
        ]);

        Log::debug($request->all());
        $area->fill($request->all());

        $area->save();
        return redirect()->route('area.manage')->with('success', 'Areas updated successfully!');
    }

    public function destroy($id){
        $area = Area::find($id)->delete();
        return back()->with('deleted', 'Area deleted successfully!');
    }
}
