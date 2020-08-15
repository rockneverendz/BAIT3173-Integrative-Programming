<?php

namespace App\Http\Controllers\Admin\Meal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Meal;
use Auth;

class DeleteMeal extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Show the controller form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.meal.delete');
    }

    public function deleteMeal($id = null)
    {
        $admin = Auth::user();
        $meal = Meal::find($id);

        // Authorize request
        if ($admin->can('delete', $meal))
        {
            $meal->delete();
            return redirect()->route('admin.meal.list')->with('status', trans('meal.deleted'));
        }
        else
        {
            return redirect()->route('admin.meal.list');
        }

    }
}
