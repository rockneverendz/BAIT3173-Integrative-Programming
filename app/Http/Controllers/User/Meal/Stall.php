<?php

namespace App\Http\Controllers\User\Meal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class Stall extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stalls = Admin::all();

        return view('user.meal.stalls', ['stalls' => $stalls]);
    }

    }
