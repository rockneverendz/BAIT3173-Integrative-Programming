<?php

namespace App\Http\Controllers\User\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;

class ListCart extends Controller
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

    public function index(Request $request)
    {
        $cart = $request->session()->get('cart');

        return view('user.cart.list', ['cart' => $cart]);
    }
 
}
