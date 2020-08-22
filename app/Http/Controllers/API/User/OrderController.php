<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;
use App\Order;
use Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return Auth::user()->orders()->orderBy('created_at','desc')->get();
    }
     
    public function show(Order $order)
    {
        if ($order->user_id == Auth::id()){
            $order->meals;
            return $order;
        }
    }
}
