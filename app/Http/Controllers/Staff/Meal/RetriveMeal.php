<?php

namespace App\Http\Controllers\Staff\Meal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Meal;
use Auth;

class RetriveMeal extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    public function retriveMeal($id = null)
    {
        $staff = Auth::user();
        $meal = Meal::find($id);

        if ($staff->can('view', $meal))
        {
            return view('staff.meal.retrive', ['meal' => $meal]);
        }
        else 
        {
            return redirect()->route('staff.meal.list');
        }
    }
}
