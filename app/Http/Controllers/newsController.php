<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class newsController extends Controller
{
    public function showManageView()
    {
        $news = News::all();
        return view('/admin/managementView/newsManage', compact('news'));
    }

    public function showCreateView()
    {
        return view('/admin/createView/newsCreate');
    }

    public function showEditView($id)
    {
        $news = News::find($id);

        return view('/admin/editView/newsEdit', compact('news'));
    }

    public function create(Request $request)
    {
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
        }


        $news->save();
        Log::info('File stored at path: ' . $path);
        Log::info('news saved successfully.', $news->toArray());

        return redirect()->route('news.manage')->with('success', 'Activity added successfully!');
    }

    public function update(Request $request, $id)
    {
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
        }



        $news->save();
        return redirect()->route('news.manage')->with('success', 'Activity added successfully!');
    
    }

    public function destroy($id)
    {
        $news = News::find($id)->delete();
        return back()->with('deleted', 'news deleted success fully!');
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
