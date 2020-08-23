<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Reload;
use Auth;

class TopUpController extends Controller
{
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

        $reload = new Reload;
        $reload->user_id = $user->id;
        $reload->admin_id = Auth::id();
        $reload->amount = $amount;
        $reload->save();

        return response()->json(null, 200);
    }

    private function validateTopUp(Request $request)
    {
        $request->validate([
            'user_id_card' => ['required', 'exists:App\User,user_id_card'],
            'amount' => ['required', 'numeric', 'min:1', 'max:1000']
        ]);
    }
}
