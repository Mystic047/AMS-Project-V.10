<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\ActivitySubmit;
use Illuminate\Support\Facades\View;

class certificateController extends Controller
{



    public function generateCertificate($id)
    {
        // Retrieve a single instance instead of a collection
        $data = ActivitySubmit::with(['student.area', 'activity'])
            ->where('actSubmitId', $id)
            ->first(); // Use first() to get a single record
    
        // Pass the data to the view
        $html = View::make('pdf.certificate', ['data' => $data])->render();
    
        // Generate the PDF from the HTML and set it to landscape
        $pdf = Pdf::loadHTML($html)
                  ->setPaper('a4', 'landscape'); // 'a4' size paper in landscape orientation
    
        // Stream the generated PDF to the browser
        return $pdf->stream('certificate.pdf', ['Attachment' => false]);
    }
    
}


