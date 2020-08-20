<?php

namespace App\Http\Controllers\User\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;

class UpdateCart extends Controller
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

    public function addToCart(Request $request)
    {
        $this->validateRequest($request);

        // Retrive form values 
        $id = $request->input('id');
        $quantity = (integer)$request->input('quantity');
        $session = $request->session()->get('cart');
        $key = 'cart.'.$id;

        // Get meal data
        $meal = Meal::find($id);
        
        // If meal is unavailable
        if ($meal->availability == false)
            abort(403);

        // Meal already exists in cart
        if ($value = $request->session()->pull($key))
        {
            $quantity += $value[0];

            // Check if quantity exceed 100
            if ($quantity > 100)
                $request->session()->push($key, 100);
            else
                $request->session()->push($key, $quantity);
        }
        // Meal does not exists in cart
        else
        {
            $request->session()->push($key, $quantity);
        }
        
        return back()->with('status', trans('cart.added'));
    }
 
    private function validateRequest(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:App\Meal,id'],
            'quantity' => ['required', 'numeric', 'min:1', 'max:100']
        ]);
    }
}
