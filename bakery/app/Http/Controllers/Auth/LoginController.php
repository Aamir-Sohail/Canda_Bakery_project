<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function __construct()
    {
       $this->middleware('checkUserLoggedIn');
       
    }

    public function index()
    {
      return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

       

        if (Auth::attempt($credentials)) {
          
          
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        \Session::flash( 'email','The provided credentials do not match our records.');
        return redirect()->back();
       
    }
}
