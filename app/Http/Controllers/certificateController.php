<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\ActivitySubmit;
use Illuminate\Support\Facades\View;

class certificateController extends Controller
{



    public function generateCertificate($id)
    {
    
        $data = ActivitySubmit::with(['student.area', 'activity'])
            ->where('actSubmitId', $id)
            ->first(); 
    
      
        $html = View::make('pdf.certificate', ['data' => $data])->render();
    
        
        $pdf = PDF::loadHTML($html)
                  ->setPaper('a4', 'landscape'); 
    
        return $pdf->stream('certificate.pdf', ['Attachment' => false]);
    }
    
}


