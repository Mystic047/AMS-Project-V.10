<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileForDownload;

class fileController extends Controller
{
    public function showManageView()
    {
        $file = FileForDownload::all();
        return view('/admin/managementView/fileManage' , compact('file'));
    }

    public function showCreateView()
    {
        return view('/admin/createView/fileCreate');
    }

    public function showEditView($id)
    {
        $admins = Admin::find($id);

        return view('/admin/editView/adminEdit', compact('admins'));
    }
}
