<?php

namespace App\Http\Controllers\Staff\Meal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Meal;
use Auth;

class ListMeals extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    /**
     * Show the controller form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $meals = Meal::where('staff_id', Auth::id())->paginate(10);

        return view('staff.meal.list', ['meals' => $meals]);
    }
}
