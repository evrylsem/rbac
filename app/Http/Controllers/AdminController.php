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
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('usertool')->with('error', 'User not found');
        }

        $roles = Role::all();

        return view('admin.manageRoles', compact('user', 'roles'));
    }

    public function updateRole(Request $request, $id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('usertool')->with('error', 'User not found');
        }
        $user->roles()->sync($request->roles);
        return redirect()->route('usertool')->with('success', 'Roles updated successfully');
    }
}
