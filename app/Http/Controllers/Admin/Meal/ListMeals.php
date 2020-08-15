<?php

namespace App\Http\Controllers\Admin\Meal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Meal;
use Auth;

class ListMeals extends Controller
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
        $meals = Meal::where('admin_id', Auth::id())->paginate(10);

        return view('admin.meal.list', ['meals' => $meals]);
    }
}
