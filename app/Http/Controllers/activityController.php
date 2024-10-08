<?php

namespace App\Http\Controllers;

use PDF;
use GuzzleHttp\Client;
use App\Models\Activity;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ActivitySubmit;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class activityController extends Controller
{
    public function showManageView()
    {
        $activities = Activity::orderBy('created_at', 'desc')->get();
        return view('/admin/managementView/activityManage', compact('activities'));
    }
    public function showManageViewFront()
    {
        $activities = Activity::orderBy('created_at', 'desc')->get();
        
        foreach ($activities as $activity) {
            // Generate URLs for morning and afternoon sessions with actId and enrollment key
            $activity->morningQrCodeUrl = route('activity.confirmSubmitQR', [
                'actId' => $activity->actId,
                'code' => $activity->morningEnrollmentKey,
                'session' => 'morning'
            ]);
            
            $activity->afternoonQrCodeUrl = route('activity.confirmSubmitQR', [
                'actId' => $activity->actId,
                'code' => $activity->afternoonEnrollmentKey,
                'session' => 'afternoon'
            ]);
        }
    
        return view('activityManage', compact('activities'));
    }
    

    public function showActivityAllViewFront()
    {
        // Fetch activities ordered by creation date (latest first) and paginate
        $activities = Activity::orderBy('created_at', 'desc')->paginate(10);
        
        return view('activityAll', compact('activities'));
    }
    

    public function showCreateView()
    {
        return view('/admin/createView/activityCreate');
    }


    public function showCreateViewFront()
    {
        return view('activityCreate');
    }

    public function showEditView($id)
    {
        $activities = Activity::find($id);

        return view('/admin/editView/activityEdit', compact('activities'));
    }

    public function showEditViewFront($id)
    {
        $activities = Activity::find($id);

        return view('activityEdit', compact('activities'));
    }

    public function showInfo($id)
    {
        $activities = Activity::find($id);

        return view('/admin/editView/activityEdit', compact('activities'));
    }

    public function create(Request $request)
    {
        Log::info('Request received for creating activity.', $request->all());
    
        $validatedData = $request->validate([
            'actName' => 'required|string',
            'actDate' => 'required|date',
            'actResBranch' => 'required|string',
            'actHour' => 'required|string',
            'actRegisLimit' => 'required|string',
            'actDetails' => 'required|string',
            'assessmentLink' => 'required|url',
            'actLocation' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'responsiblePerson' => 'required|string',
        ]);
    
        Log::info('Validation passed.', $validatedData);
    
        $activity = new Activity();
        $activity->fill($validatedData);
    
        // Generate random enrollment keys
        $activity->morningEnrollmentKey = $this->generateEnrollmentKey();
        $activity->afternoonEnrollmentKey = $this->generateEnrollmentKey();
    
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/activity_pictures', $filename);
            $activity->picture = str_replace('public/', '', $path);
        }
    
        $activity->save();
    
        $activityId = $activity->getKey(); // This retrieves the primary key (actId)

        Log::info('Activity saved successfully with ID: ' . $activityId); // Log the primary key
    
        // Generate the link to the activity with its ID
        $activityLink = url("/activity-info/{$activity->actId}");
    
        $message = "BRU SC Activity noti: 🎉 *New Activity Created!* 🎉\n\n"
            . "🆔 รหัสกิจกรรม: " . $activity->actId . "\n"
            . "🏷️ ชื่อ กิจกรรม: " . $activity->actName . "\n"
            . "📅 วันที่: " . $activity->actDate . "\n"
            . "⏰ ชั่วโมงที่ได้: " . $activity->actHour . "\n"
            . "📍 สถานที่: " . $activity->actLocation . "\n"
            . "👥 อาจารย์ ที่รับผิดชอบ: " . $activity->responsiblePerson . "\n"
            . "🔗 รายละเอียด: " . $activity->actDetails . "\n\n"
            . "🔗 คลิกเพื่อดูรายละเอียดกิจกรรม: [Activity Link]($activityLink)";
    
        // Send notification to Line
        $this->sendLineNotify($message);
    
        return back()->with('success', 'กิจกรรมถูกเพิ่มเรียบร้อยแล้ว!');
    }
    
    


    private function sendLineNotify($message)
    {
        $client = new Client();

        $response = $client->post('https://notify-api.line.me/api/notify', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('LINE_NOTIFY_TOKEN'),
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'message' => $message,
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            Log::error('Failed to send notification to LINE Notify.', ['response' => $response->getBody()->getContents()]);
        }
    }




    public function update(Request $request, $id)
    {
        try {
            $activity = Activity::findOrFail($id);
    
            $validatedData = $request->validate([
                'actName' => 'required|string',
                'actDate' => 'required|date',
                'actResBranch' => 'required|string',
                'actHour' => 'required|string',
                'actRegisLimit' => 'required|string',
                'actDetails' => 'required|string',
                'actLocation' => 'required|string',
                'assessmentLink' => 'required|url',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'responsiblePerson' => 'required|string',
                'isOpen' => 'nullable|boolean',
            ]);
    
            Log::info('Validation passed.', $validatedData);
    
            $activity->fill($validatedData);
    
            if ($request->hasFile('picture')) {
                // Delete the old picture if it exists
                if ($activity->picture && Storage::exists('public/' . $activity->picture)) {
                    Storage::delete('public/' . $activity->picture);
                }
    
                $file = $request->file('picture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/activity_pictures', $filename);
                $activity->picture = str_replace('public/', '', $path);
            }
    
            $activity->save();
    
            return back()->with('success', 'กิจกรรมได้รับการแก้ไขเรียบร้อยแล้ว!');


            
        } catch (\Exception $e) {
            Log::error('Failed to update activity: ' . $e->getMessage());
            return back()->with('error', 'เกิดข้อผิดพลาดในการแก้ไขกิจกรรม กรุณาลองใหม่อีกครั้ง.')->withInput();

        }
    }
    

    public function destroy($id)
    {
        $activity = Activity::find($id)->delete();
        return back()->with('success', 'กิจกรรมถูกลบออกเรียบร้อยแล้ว!');

    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for coordinators by firstname, lastname, or faculty_id
        $activity = Activity::where('firstName', 'LIKE', "%{$query}%")
            ->orWhere('lastName', 'LIKE', "%{$query}%")
            ->orWhere('adminId', 'LIKE', "%{$query}%")
            ->get();

        return view('/admin/managementView/adminManage', compact('activity'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->isOpen = $request->input('isOpen');
        $activity->save();

        return response()->json(['success' => true]);
    }



    public function generatePDF($id)
    {
        $activity = Activity::find($id);

        if (!$activity) {
            return redirect()->back()->with('error', 'ไม่พบกิจกรรม.');
        }

        $activitiesSubmits = ActivitySubmit::with(['student.area'])
            ->where('actId', $id)
            ->get();

        // Log the data for debugging
        Log::info('Activity:', [$activity]);
        Log::info('Activities Submits:', [$activitiesSubmits]);

        $html = View::make('pdf.activity', compact('activity', 'activitiesSubmits'))->render();
        $pdf = PDF::loadHTML($html);

        return $pdf->stream('activity-submits.pdf');
    }
    
    public function generateEnrollmentKey($length = 6)
    {
        return Str::random($length);
    }
    protected $casts = [
        'actDate' => 'date',  // Ensuring 'actDate' is treated as a date
    ];
}
