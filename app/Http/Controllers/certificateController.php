<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Support\Facades\View;

class certificateController extends Controller
{



    public function generateCertificate()
    {
        // Render the Blade view into HTML
        $html = View::make('pdf.certificate')->render();

        // Generate the PDF from the HTML and set it to landscape
        $pdf = Pdf::loadHTML($html)
                  ->setPaper('a4', 'landscape'); // 'a4' size paper in landscape orientation

        // Stream the generated PDF to the browser
        return $pdf->stream('certificate.pdf', ['Attachment' => false]);
    }
}


