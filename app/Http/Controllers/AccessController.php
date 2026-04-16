<?php
// HRM WhatsApp Integration Refreshed: 2026-04-10


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Facades\Mail;
use App\Services\WhatsApp\WhatsAppNotificationManager;

class AccessController extends Controller
{
    protected $whatsappManager;

    public function __construct(WhatsAppNotificationManager $whatsappManager)
    {
        $this->whatsappManager = $whatsappManager;
    }

    public function access()
    {
        $customers = Customer::all();
        $users = User::orderBy('created_at', 'asc')->get();
        //  return $users;
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('access.createLogin', compact('users', 'customers', 'roles'));
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

            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($rawPassword);
            $user->customer_name = $request->customer_name;
            $user->role = $request->role;
            $user->save();

            // Assign Spatie role to user for permissions
            $user->assignRole($request->role);

            Mail::to($user->email)->send(new UserRegisteredMail($user, $rawPassword));

            // Send WhatsApp Welcome Message if name and phone exist
            $whatsappSent = false;
            if ($user->customer_name || $user->role != 'client') {
                $customer = Customer::where('customers_name', $user->customer_name)->first();
                $phone = $customer ? $customer->phone : null;
                $name = $customer ? $customer->customers_name : $user->name; // Use user name if customer not found

                if ($phone) {
                    if ($user->role == 'client') {
                        $this->whatsappManager->sendWelcome($phone, $name, $user->email, $rawPassword, $user);
                    } else {
                        // Use HRM specific template for staff roles
                        $this->whatsappManager->sendHrmWelcome($phone, $name, $user->role, $user->email, $user);
                    }
                    $whatsappSent = true;
                }
            }

            DB::commit();
            $msg = 'User created and credentials sent via email' . ($whatsappSent ? ' and WhatsApp.' : '.');
            return redirect()->back()->with('success', $msg);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

}

