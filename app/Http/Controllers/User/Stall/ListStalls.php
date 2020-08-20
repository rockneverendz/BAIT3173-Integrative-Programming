<?php

namespace App\Http\Controllers\User\Stall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class ListStalls extends Controller
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

        return view('user.stall.list', ['stalls' => $stalls]);
    }

    public function showStallDetails($stalls_id = null)
    {
        if ($stall = Admin::find($stalls_id))
        {
            $meals = $stall->meals()->where('availability', true)->get();
            return view('user.stall.retrive', [
                'stall' => $stall,
                'meals' => $meals, 
            ]);
        }
        else
        {
            abort(404);
        }

    }
}
