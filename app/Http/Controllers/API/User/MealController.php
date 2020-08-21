<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;

class MealController extends Controller
{
    public function index()
    {
        return Meal::where('availability', true)->get();
    }

    public function show(Meal $meal)
    {
        if ($meal->availability)
        {
            return $meal;
        }
    }
}