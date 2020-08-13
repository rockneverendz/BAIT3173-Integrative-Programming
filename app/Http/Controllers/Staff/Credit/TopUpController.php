<?php

namespace App\Http\Controllers\Staff\Credit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class TopUpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('staff.credit.topup');
    }

    public function topUp(Request $request)
    {
        $this->validateTopUp($request);

        // Retrive form values
        $user_id_card = $request->input('user_id_card');
        $amount = $request->input('amount');

        // Retrive user from database
        $user = User::where('user_id_card', $user_id_card)->first();
        
        // Process Top Up
        $before = $user->credit;
        $after = $before + $amount;

        // Update Database
        $user->credit = $after;
        $user->save();

        // Continue to topup
        return back()->with('status',[
            'before' => $before,
            'amount' => $amount,
            'after' => $after,
        ]);
    }

    private function validateTopUp(Request $request)
    {
        $request->validate([
            'user_id_card' => ['required', 'exists:App\User,user_id_card'],
            'amount' => ['required', 'numeric', 'min:1', 'max:1000']
        ]);
    }
}
