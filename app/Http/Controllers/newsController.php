<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Professor;
use App\Models\Coordinator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class newsController extends Controller
{
    public function showManageView()
    {
        $news = News::all();
        return view('/admin/managementView/newsManage', compact('news'));
    }
    public function showManageViewFront()
    {
        $news = News::paginate(5);
        return view('newsManage', compact('news'));
    }
    public function showInfoView()
    {
        $news = News::paginate(5);
        $writers = [];
    
        foreach ($news as $item) {
            switch ($item->createdByRole) {
                case 'admin':
                    $writers[$item->id] = Admin::find($item->createdBy); 
                    break;
                case 'student':
                    $writers[$item->id] = Student::find($item->createdBy);
                    break;
                case 'coordinator':
                    $writers[$item->id] = Coordinator::find($item->createdBy);
                    break;
                case 'professor':
                    $writers[$item->id] = Professor::find($item->createdBy);
                    break;
            }
        }
    
        return view('news', compact('news', 'writers'));
    }
    

    public function showDetailsView($id)
    {
        $news = News::find($id);
        return view('newsdetails' , compact('news'));
    }


    public function showCreateView()
    {
        return view('/admin/createView/newsCreate');
    }

    public function showCreateViewFront()
    {
        return view('newsCreate');
    }

    public function showEditView($id)
    {
        $news = News::find($id);

        return view('/admin/editView/newsEdit', compact('news'));
    }
    public function showEditViewFront($id)
    {
        $news = News::find($id);

        return view('newsEdit', compact('news'));
    }
    public function create(Request $request)
    {
        $user = getAuthenticatedUser();
    
        try {
            Log::info('Request received for creating news.', $request->all());
    
            $validatedData = $request->validate([
                'title' => 'required|string',
                'details' => 'required|string',
                'imagePath' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            Log::info('Validation passed.', $validatedData);
    
            $news = new News();
            $news->fill($validatedData);
    
            if ($request->hasFile('imagePath')) {
                $file = $request->file('imagePath');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/newsPicture/', $filename);
                $news->imagePath = str_replace('public/', '', $path);
                Log::info('File stored at path: ' . $path);
            }
    
            $news->createdBy = $user->userId;
            $news->createdByRole = $user->role;
    
            $news->save();
            Log::info('News saved successfully.', $news->toArray());
    
            return back()->with('success', 'News added successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed: ' . $e->getMessage());
            return back()->with('error', 'Validation failed. Please check your input.')->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Database error: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while saving the news. Please try again later.')->withInput();
        } catch (\Exception $e) {
            Log::error('Unknown error: ' . $e->getMessage());
            return back()->with('error', 'An unknown error occurred. Please try again later.')->withInput();
        }
    }
    

    public function update(Request $request, $id)
    {
        try {
            $news = News::findOrFail($id);
    
            $validatedData = $request->validate([
                'title' => 'required|string',
                'details' => 'required|string',
                'imagePath' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            Log::info('Validation passed.', $validatedData);
    
            $news->fill($validatedData);
    
            if ($request->hasFile('imagePath')) {
                $file = $request->file('imagePath');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/newsPicture/', $filename);
                $news->imagePath = str_replace('public/', '', $path);
                Log::info('File stored at path: ' . $path);
            }
    
            $news->save();
            Log::info('News updated successfully.', $news->toArray());
    
            return back()->with('success', 'News updated successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to update news: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating the news. Please try again later.')->withInput();
        }
    }
    

    public function destroy($id)
    {
        $news = News::find($id)->delete();
        return back()->with('success', 'news deleted success fully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $news = News::where('title', 'LIKE', "%{$query}%")
            ->orWhere('details', 'LIKE', "%{$query}%")
            ->get();

        return view('/admin/managementView/newsManage', compact('news'));
    }
}
