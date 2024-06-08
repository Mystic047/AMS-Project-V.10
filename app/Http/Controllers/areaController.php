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
        return view('/admin/createView/areaCreate' );
    }

    public function showEditView($id)
    {
        $areas = Area::find($id);
        return view('/admin/editView/areaEdit' , compact('areas'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'area_id' => 'required|string',
            'areaName' => 'required|string',  
            'faculty_id' => 'required|string',
        ]
        );

        Log::debug($request->all());

        $area = new Area;
        $area->fill($request->all());

    
        $area->save();

        return redirect()->route('area.manage')->with('success', 'Areas added successfully!');
    }

    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);

        $request->validate([
            'area_id' => 'required|string',
            'areaName' => 'required|string',  
            'faculty_id' => 'required|string',
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
