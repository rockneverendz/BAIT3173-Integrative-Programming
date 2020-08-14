<?php

namespace App\Http\Controllers\Staff\Meal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Meal;

class CreateMeal extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    /**
     * Show the controller form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('staff.meal.create');
    }

    public function createMeal(Request $request)
    {
        
        $this->validateMeal($request);
        
        // Retrive form values
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $active = $request->input('availability') ? 1 : 0;
        $image = $request->file('image');

        // Store image
        $path = Storage::putFile('images', $image, 'public');

        // Create new meal
        $meal = new Meal;
        $meal->name = $name;
        $meal->description = $description;
        $meal->price = $price;
        $meal->availability = $active;
        $meal->image = $path;

        // Update Database
        $meal->save();

        // Continue to list with status
        return redirect()->route('staff.meal.list');
    }

    private function validateMeal(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric', 'min:1', 'max:100'],
            'image' => ['required', 'image', 'mimes:jpeg,png', 'max:2048'],
        ]);
    }
}
