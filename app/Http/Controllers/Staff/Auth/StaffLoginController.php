<?php

namespace App\Http\Controllers\Staff\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class StaffLoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::STAFF_HOME;

    public function __construct()
    {
        $this->middleware('guest:staff')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('staff');
    }

    public function showLoginForm()
    {
        return view('staff.auth.login');
    }
}
