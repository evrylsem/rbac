<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageUsers(){
        $users = User::select('id','name','email')->paginate(10);
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.manageUsers')->with(compact('users'));
    }

    public function deleteUser($id){
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('usertool')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('usertool')->with('error', 'User not found');
        }
    }

    public function editRoles($id){
        $roles = Role::all();
        $permissions = $roles->flatMap->permissions;
        $user = User::findOrFail($id);

        session(['pwChangeEnabled'=>'disabled']);

        return view('admin.manageRoles')->with(compact('user', 'roles', 'permissions')) ;
    }

    public function updateRole(Request $request, $id){
        $user = User::findOrFail($id);

        $user->userInfo()->update([
            'user_firstname' => $request->input('firstname'),
            'user_lastname' => $request->input('lastname'),
        ]);
    
        $user->update([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
        ]);

        if ($request->has('enable_password_change')) {
            $request->validate([
                'user_password' => 'required|min:8|confirmed',
            ]);
    
            $user->update([
                'password' => bcrypt($request->input('user_password')),
            ]);
        }
        
        $user->roles()->sync($request->input('user-role', []));

        return redirect()->route('usertool')->with('success', 'User roles and password updated successfully');
    }
}
