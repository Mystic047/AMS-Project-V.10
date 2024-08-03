<?php

namespace App\Http\Controllers;


use App\Models\ActivitySubmit;

class activitySubmitHistoryController extends Controller
{
    public function history($id){
        
        $history = ActivitySubmit::with('activity')
        ->where('userId', $id)
        ->get();
        return view('activitySubmitHistory', compact('history'));
    }
}
