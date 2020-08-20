<?php

namespace App\Http\Controllers\User\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;

class RemoveItem extends Controller
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

    public function removeItem(Request $request, $meal_id = null)
    {
        
        $request->session()->forget('cart.'.$meal_id);

        return back()->with('status', trans('cart.deleted'));
    }
}
