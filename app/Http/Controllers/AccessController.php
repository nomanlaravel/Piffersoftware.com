<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Facades\Mail;
class AccessController extends Controller
{
    public function access(){
        $customers = Customer::all();
         $users = User::orderBy('created_at', 'asc')->get();
        //  return $users;
        $roles=Role::where('name','!=','Super Admin')->get();
        return view('access.createLogin' , compact('users' , 'customers','roles'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
            'customer_name' => 'nullable|string',
        ]);
    
        DB::beginTransaction();
        try {
            $rawPassword = $request->password; 
    
               $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($rawPassword),
                'customer_name' => $request->customer_name,
                 'role' => $request->role, 
            ]);
            Mail::to($user->email)->send(new UserRegisteredMail($user, $rawPassword));
            DB::commit();
            return redirect()->back()->with('success', 'User created and credentials sent via email.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

}

