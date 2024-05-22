<?php

namespace App\Http\Controllers;

use App\Models\Faculty;

class testRelationController extends Controller
{
    public function indexAction()
    {
        // Eager load areas with faculties to minimize query loads
        $faculties = Faculty::with('areas')->get(); 
        return view('TEST.testRelation', compact('faculties'));
    }

}
