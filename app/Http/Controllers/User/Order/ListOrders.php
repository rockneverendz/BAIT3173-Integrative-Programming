<?php

namespace App\Http\Controllers\User\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;
use Auth;

class ListOrders extends Controller
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
        $orders = Auth::user()->orders()->orderBy('created_at','desc')->get();

        return view('user.order.list', ['orders' => $orders]);
    }
 
}
