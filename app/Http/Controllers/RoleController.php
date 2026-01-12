<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->creat_permission();       //use to create permission

        $roles = Role::where('name','!=','Super Admin')->orderBy('name','asc')->get();
        // return $roles;
        // $roles = Role::orderBy('name','asc')->get();

        return view('pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_permissions  = Permission::orderBy('id','asc')->get();
        $permission_groups = User::getpermissionGroups();
        return view('pages.roles.create', compact('all_permissions','permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role=Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);           //Assign permission to role
        }
        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role=Role::find($id);
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('pages.roles.edit' , compact('role' , 'all_permissions' , 'permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $role = Role::find($id);
        $role->name = $request->name;
        $role->update();
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);           //Assign permission to role
        }
        return redirect()->route('roles.index')->with('success', 'Role Updated Successfully');
    }

    public function destroy(string $id)
    {
        $user = Role::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Role Deleted Successfully');
    }

    public function edit_access_role(string $id)
    {
      $user=User::find($id);
      $customers = Customer::all();
        $roles=Role::where('name','!=','Super Admin')->get();
        return view('access.updatelogin',compact( 'roles','user','customers'));
    }

    public function update_access_role(Request $request, string $id)
        {
            // return $request->all();
            $user = User::find($id);
            // if (!$user) {
            //     return response()->json(['error' => 'User not found'], 404);
            // }

            // $request->validate([
            //     'name' => 'required|string|max:255',
            //     'email' => 'required|email|unique:users,email,' . $user->id,
            //     'password' => 'nullable|string|min:6',
            // ]);

            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            DB::beginTransaction();

            try {
                $user->syncRoles([$request->role]);
                // return $user;
                $user->update();

                DB::commit();
                return redirect()->route('access')->with(['success' => 'User role  updated successfully']);

            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
       
       
       public function admin_delete_customer(string $id)
        {
            $user = User::find($id);
        
            if (!$user) {
                return redirect()->back()->with('error', 'User not found');
            }
        
            DB::beginTransaction();
        
            try {
                // Detach roles
                $user->roles()->detach();
        
                // Delete user
                $user->delete();
        
                DB::commit();
                return redirect()->route('access')->with('success', 'User deleted successfully');
        
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Failed to delete user: ' . $e->getMessage());
            }
        }


    public function creat_permission()
    {
        // //  user form
        // $permission = Permission::create([
        //     'name' => 'view_user',
        //     'group_name' => 'user',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'add_user',
        //     'group_name' => 'user',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'update_user',
        //     'group_name' => 'user',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'delete_user',
        //     'group_name' => 'user',
        //     'guard_name' => 'web'
        // ]);

        // //  department form
        // $permission = Permission::create([
        //     'name' => 'view_department',
        //     'group_name' => 'department',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'add_department',
        //     'group_name' => 'department',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'update_department',
        //     'group_name' => 'department',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'delete_department',
        //     'group_name' => 'department',
        //     'guard_name' => 'web'
        // ]);

        // // folder form
        // $permission = Permission::create([
        //     'name' => 'view_folder',
        //     'group_name' => 'folder',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'add_folder',
        //     'group_name' => 'folder',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'update_folder',
        //     'group_name' => 'folder',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'delete_folder',
        //     'group_name' => 'folder',
        //     'guard_name' => 'web'
        // ]);

        // //  sub folder form
        // $permission = Permission::create([
        //     'name' => 'view_sub_folder',
        //     'group_name' => 'sub_folder',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'add_sub_folder',
        //     'group_name' => 'sub_folder',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'update_sub_folder',
        //     'group_name' => 'sub_folder',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'delete_sub_folder',
        //     'group_name' => 'sub_folder',
        //     'guard_name' => 'web'
        // ]);
        // //  sub folder form
        // $permission = Permission::create([
        //     'name' => 'view_files',
        //     'group_name' => 'files',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'add_files',
        //     'group_name' => 'files',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'update_files',
        //     'group_name' => 'files',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'delete_files',
        //     'group_name' => 'files',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'download_files',
        //     'group_name' => 'files',
        //     'guard_name' => 'web'
        // ]);
        // $permission = Permission::create([
        //     'name' => 'bulk_download_files',
        //     'group_name' => 'files',
        //     'guard_name' => 'web'
        // ]);

    }


}
