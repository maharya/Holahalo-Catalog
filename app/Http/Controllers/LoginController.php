<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        $data = [
            'pageTitle' => 'Login'
        ];
        
    	return view('login', compact('data'));
    }

    public function login(Request $request)
    {
        // dd($request);
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            Session::flash('message', 'Anda berhasil login!');

            // if successful, then redirect to their intended location
            return redirect()->intended(route('index'));
        }

        Session::flash('message', 'Anda gagal Login! Cek kembali email dan password anda');
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check())
    	{
    		Auth::guard('admin')->logout();
    	}

        Session::flush();

    	return redirect()->route('index');
    }
}
