<?php

namespace App\Http\Controllers\Staff\Credit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        // Continue to topup

    }

    private function validateTopUp(Request $request)
    {
        $request->validate([
            'user_id_card' => ['required', 'exists:App\User,user_id_card'],
            'amount' => ['required', 'numeric', 'min:1', 'max:1000']
        ]);
    }
}
