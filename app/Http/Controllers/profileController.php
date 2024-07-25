<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class profileController extends Controller
{
   
    
    public function updateProfile(Request $request)
    {
        $request->validate([
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'nickName' => 'nullable|string',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Log::debug($request->all());
        $user = getAuthenticatedUser();
        
        if (!$user) {
            return back()->withErrors(['error' => 'User not authenticated']);
        }
    
        $user->firstName = $request->input('firstName', $user->firstName);
        $user->lastName = $request->input('lastName', $user->lastName);
        $user->nickName = $request->input('nickName', $user->nickName);
    
        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures', $filename);
            $user->profilePicture = str_replace('public/', '', $path);
        }
    
        $user->save();
    
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
    
    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Log::debug($request->all());
        $user = getAuthenticatedUser();
        
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    
        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures', $filename);
            $user->profilePicture = str_replace('public/', '', $path);
            $user->save();
    
            return response()->json(['success' => 'Profile picture updated successfully!']);
        }
    
        return response()->json(['error' => 'No file uploaded'], 400);
    }
    
}
