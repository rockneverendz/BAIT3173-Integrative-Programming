<?php

namespace App\Http\Controllers\Admin\Meal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Meal;
use Auth;

class RetriveMeal extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function retriveMeal($id = null)
    {
        

        $admin = Auth::user();
        
        
        if ($meal = Meal::find($id))
        {
            if ($admin->can('view', $meal))
            {
                return view('admin.meal.retrive', ['meal' => $meal]);
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
