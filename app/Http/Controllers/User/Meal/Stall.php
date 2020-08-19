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

    public function showStallDetails($stalls_id = null)
    {
        if ($stall = Admin::find($stalls_id))
        {
            $meals = $stall->meals()->get();
            return view('user.meal.menu', ['meals' => $meals]);
        }
        else
        {
            abort(404);
        }

    }
}
