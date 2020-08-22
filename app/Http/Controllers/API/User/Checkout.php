<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;
use App\OrderList;
use App\Order;
use Auth;

class Checkout extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $orderlists = $request->input('orderlist');
        $credit = $user->credit;
        $total = 0.00;
        
        // Count total
        foreach ($orderlists as $orderlist)
        {
            $meal = Meal::find($orderlist['meal_id']);
            $price = $meal->price;
            $quantity = $orderlist['quantity'];
            $subtotal = $price * $quantity;
            $total += $subtotal;
        }

        // Check if user's credit is enough
        if($credit > $total)
        {
            $user->credit = $credit - $total;
            $user->save();
        } 
        else
        {
            // Return not enough credit error
            return response()->json([
                'error' => 'Not enough credit'
            ], 400);
        }

        // Make order
        $order = new Order;
        $order->status = 'Paid';
        $order->payment_amount = $total;
        $order->user_id = $user->id;
        $order->save();

        // Make orderlist
        foreach ($orderlists as $orderlist)
        {
            $meal = Meal::find($orderlist['meal_id']);
            $price = $meal->price;
            $quantity = $orderlist['quantity'];

            $orderlist = new Orderlist;
            $orderlist->order_id = $order->id;
            $orderlist->meal_id = $meal->id;
            $orderlist->quantity = $quantity;
            $orderlist->price_each = $price;
            $orderlist->save();
        }
        
        return response()->json(null, 200);
    }
 
}
