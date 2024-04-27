<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class customAuthController extends Controller
{
//FOR USER
  public function showLoginForm()
  {
      return view('auth.login');
  }

  public function showLoginInfo()
  {
      return view('auth.testlogin');
  }


  // Process the login form submission
  public function login(Request $request)
  {
      $credentials = $request->validate([
          'email' => 'required|email',
          'password' => 'required',
      ]);

      if (Auth::attempt($credentials)) {
          $request->session()->regenerate();

          return redirect()->route('login.showinfo');
      }

      return back()->withErrors(['email' => 'Invalid credentials']);
  }


// FOR ADMIN
public function showAdminLoginForm (){
    return view('auth.admin.login');
}

public function showAdminDashboard (){
    return view('dashboard.admin.dashboard');
}

public function loginAdmin(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}















  // Logout the all user
  public function logout(Request $request)
  {

     $guards = ['web', 'admin'];

     foreach ($guards as $guard) {
         if (Auth::guard($guard)->check()) {
             Auth::guard($guard)->logout();
         }
     }
  
      // Invalidate session and regenerate CSRF token
      $request->session()->invalidate();
      $request->session()->regenerateToken();
     
      // Redirect to login page with success message
      return redirect()->route('login.show')->with('success', 'You have been logged out successfully.');
  }
  
}
