<?php

namespace App\Http\Controllers\User\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;
use App\OrderList;
use App\Order;
use Auth;

class Checkout extends Controller
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

        return view('user.cart.checkout', ['cart' => $cart]);
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cart = $request->session()->get('cart');
        $credit = $user->credit;
        $total = 0.00;
        
        // Count total
        foreach ($cart as $id => $item)
        {
            $price = $item[0]['price'];
            $quantity = $item[0]['quantity'];
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
            return back()->with('error', trans('checkout.low_credit'));
        }

        // Make order
        $order = new Order;
        $order->status = 'Paid';
        $order->payment_amount = $total;
        $order->user_id = $user->id;
        $order->save();

        // Make orderlist
        foreach ($cart as $id => $item)
        {
            $orderlist = new Orderlist;
            $orderlist->order_id = $order->id;
            $orderlist->meal_id = $id;
            $orderlist->quantity = $item[0]['quantity'];
            $orderlist->price_each = $item[0]['price'];
            $orderlist->save();
        }
        
        $request->session()->forget('cart');
        return redirect()->route('user.home')->with('status', trans('checkout.successful'));
    }
 
}
