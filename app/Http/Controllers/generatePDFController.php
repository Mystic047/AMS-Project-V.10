<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivitySubmit;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class generatePDFController extends Controller
{
    public function generateActivitiesPDFByDate(Request $request)
    {

        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        $activities = Activity::withCount('activitySubmits')
            ->whereBetween('actDate', [$request->startDate, $request->endDate])
            ->orderBy('actDate', 'asc')
            ->get();

        \Log::info('Filtered activities with submission counts:', [$activities]);

        $html = View::make('pdf.actAll', [
            'activities' => $activities,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
        ])->render();

        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);

        return $pdf->stream('activities-summary.pdf', ["Attachment" => false]);
    }

    public function generateUserActivityHistoryPDF(Request $request, $userId = null)
    {
        $user = $userId ? Student::find($userId) : getAuthenticatedUser();

        if (!$user) {
            return redirect()->back()->with('error', 'ไม่พบผู้ใช้นี้');
        }

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = ActivitySubmit::with('activity')
            ->where('userId', $user->userId);

        if ($startDate && $endDate) {
            $query->whereHas('activity', function ($q) use ($startDate, $endDate) {
                $q->whereBetween('actDate', [$startDate, $endDate]);
            });
        }

        $activitySubmits = $query->orderBy('created_at', 'asc')->get();

        \Log::info('User Activity History:', [$user, $activitySubmits]);

        $html = View::make('pdf.actHistory', [
            'user' => $user,
            'activitySubmits' => $activitySubmits,
        ])->render();

        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);

        return $pdf->stream('user-activity-history.pdf', ["Attachment" => false]);
    }
    public function generateUserActivityHistoryPDF2(Request $request, $actId)
    {
        // Retrieve the activity based on the actId
        $activity = Activity::find($actId);

        if (!$activity) {
            return redirect()->back()->with('error', 'ไม่พบกิจกรรมนี้');
        }

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query for the activity submissions along with the related student and activity
        $query = ActivitySubmit::with(['student', 'activity'])
            ->where('actId', $actId);

        if ($startDate && $endDate) {
            $query->whereHas('activity', function ($q) use ($startDate, $endDate) {
                $q->whereBetween('actDate', [$startDate, $endDate]);
            });
        }

        $activitySubmits = $query->orderBy('created_at', 'asc')->get();

        // Assuming the student is the same for all submissions, you can get the student from the first submission
        $student = $activitySubmits->isNotEmpty() ? $activitySubmits->first()->student : null;

        if (!$student) {
            return redirect()->back()->with('error', 'ไม่พบข้อมูลนักศึกษา');
        }

        \Log::info('Activity Submits:', [$activity, $activitySubmits]);

        // Pass the activity, student, and activity submissions to the view
        $html = View::make('pdf.actHistory2', [
            'activity' => $activity,
            'student' => $student,
            'activitiesSubmits' => $activitySubmits,
        ])->render();

        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);

        return $pdf->stream('activity-history.pdf', ["Attachment" => false]);
    }

    public function generateResponsiblePersonPDF(Request $request)
    {

        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        $activities = Activity::whereBetween('actDate', [$request->startDate, $request->endDate])
            ->orderBy('actDate', 'asc')
            ->get();

        \Log::info('Filtered activities with responsible persons:', [$activities]);

        $html = View::make('pdf.responsiblePerson', [
            'activities' => $activities,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
        ])->render();

        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);

        return $pdf->stream('responsible-persons.pdf', ["Attachment" => false]);
    }

}
