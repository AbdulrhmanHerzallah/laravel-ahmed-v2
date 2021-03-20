<?php

namespace App\Http\Controllers\SuperDashboard\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function indexLogin()
    {
        return view('super-dashboard.auth.login');
    }
}
