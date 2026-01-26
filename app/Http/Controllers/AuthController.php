<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loadLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required',
        ]);

        $userCredentials = $request->only('email', 'password');
        

        if (Auth::attempt($userCredentials)) {
            return redirect()->intended('/home');
        } else {
            return back()->with('error', 'Username & Password are incorrect');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
    }
    
    public function dashboard()
    {
$customers = Customer::select('id','email', 'customers_name')->get();
return view('auth.dashboard', compact('customers'));
    }
}
