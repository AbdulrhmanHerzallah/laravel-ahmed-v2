<?php

namespace App\Http\Controllers\SuperDashboard\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function login()
    {
        return view('super-dashboard.auth.login');
    }

    public function show()
    {
      $users = User::withTrashed()->orderBy('id', 'DESC')->where('is_admin', 1)
           ->where('id', '<>', auth()->id())->with(['permissions', 'roles'])
           ->get();
      $allPer = Role::with('permissions')->get();
      return view('super-dashboard.permissions.show', ['users' => $users, 'allPer' => $allPer]);
    }

    public function store(Request $request)
    {
        $user = User::withTrashed()->findOrFail($request->user_id);
        $requested = $request->except(['_token', 'user_id']);

        // Permissions
        foreach (Permission::all(['name']) as $per) {
            $user->revokePermissionTo($per->name);}

        foreach ($requested as $val) {try {$user->givePermissionTo($val);
            }catch (\Spatie\Permission\Exceptions\PermissionDoesNotExist $exception) {continue;}}

        // Roles
        foreach (Role::all(['name']) as $role) {
           $user->removeRole($role->name);
        }

        foreach ($requested as $val) {try {$user->assignRole($val);
            }catch (\Spatie\Permission\Exceptions\RoleDoesNotExist $exception) {continue;}}

        toast(__('keywords.the.permeation.is.registered'), 'success');
        return redirect()->back();
    }
}
