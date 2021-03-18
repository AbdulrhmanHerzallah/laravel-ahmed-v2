<?php

namespace App\Http\Controllers\SuperDashboard\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    public function login()
    {
        return view('super-dashboard.auth.login');
    }

    public function show()
    {
       $users = User::withTrashed()->orderBy('id', 'DESC')->where('is_admin', 1)->get();
       return view('super-dashboard.permissions.show', ['users' => $users]);
    }
}
