<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivitySubmit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class generatePDFController extends Controller
{
    public function generateActivitiesPDFByDate(Request $request)
    {
        // Validate the date input
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        // Fetch activities between the selected start and end dates
        $activities = Activity::withCount('activitySubmits')
            ->whereBetween('actDate', [$request->startDate, $request->endDate])
            ->orderBy('actDate', 'asc')
            ->get();

        // Log the data for debugging
        \Log::info('Filtered activities with submission counts:', [$activities]);

        // Render the view to HTML
        $html = View::make('pdf.actAll', [
            'activities' => $activities,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
        ])->render();

        // Properly instantiate the PDF wrapper and load the HTML
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);

        // Return the generated PDF as a stream to the browser (inline)
        return $pdf->stream('activities-summary.pdf', ["Attachment" => false]);
    }

    public function generateUserActivityHistoryPDF(Request $request, $userId = null)
    {
        // If no userId is passed, default to the authenticated user
        $user = $userId ? User::find($userId) : getAuthenticatedUser();
    
        // If the user is not found, return with an error
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        // Fetch the activity submission history for the user
        $activitySubmits = ActivitySubmit::with('activity') // Load related activities
            ->where('userId', $user->userId)
            ->orderBy('created_at', 'asc')
            ->get();
    
        // Log the data for debugging
        \Log::info('User Activity History:', [$user, $activitySubmits]);
    
        // Render the view to HTML
        $html = View::make('pdf.actHistory', [
            'user' => $user,
            'activitySubmits' => $activitySubmits,
        ])->render();
    
        // Properly instantiate the PDF wrapper and load the HTML
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);
    
        // Return the generated PDF as a stream to the browser (inline)
        return $pdf->stream('user-activity-history.pdf', ["Attachment" => false]);
    }
    
    public function generateResponsiblePersonPDF()
    {
        // Fetch all activities ordered by activity date or any other criteria
        $activities = Activity::orderBy('actDate', 'asc')->get();
    
        // Log the data for debugging
        \Log::info('Activities and responsible persons:', [$activities]);
    
        // Render the view to HTML
        $html = View::make('pdf.responsiblePerson', [
            'activities' => $activities,
        ])->render();
    
        // Properly instantiate the PDF wrapper and load the HTML
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);
    
        // Return the generated PDF as a stream to the browser (inline)
        return $pdf->stream('responsible-persons.pdf', ["Attachment" => false]);
    }
    
}
