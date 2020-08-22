<?php

namespace App\Http\Controllers\User\Meal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;

class RetriveMeal extends Controller
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
    public function index($meal_id = null)
    {
        if ($meal = Meal::find($meal_id))
        {
            if ($meal->availability)
            {
                return view('user.meal.retrive', ['meal' => $meal]);
            }
            else
            {
                abort(403);
            }
        }
        else 
        {
            abort(404);
        }
    }
}
