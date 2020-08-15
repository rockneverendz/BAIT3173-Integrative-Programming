<?php

namespace App\Http\Controllers\Staff\Meal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Meal;
use Auth;

class DeleteMeal extends Controller
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
        return view('staff.meal.delete');
    }

    public function deleteMeal($id = null)
    {
        $staff = Auth::user();
        $meal = Meal::find($id);

        // Authorize request
        if ($staff->can('delete', $meal))
        {
            $meal->delete();
            return redirect()->route('staff.meal.list')->with('status', trans('meal.deleted'));
        }
        else
        {
            return redirect()->route('staff.meal.list');
        }

    }
}
