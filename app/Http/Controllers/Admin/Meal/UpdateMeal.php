<?php

namespace App\Http\Controllers\Admin\Meal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Meal;
use Auth;

class UpdateMeal extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function updateMeal(Request $request, $id = null)
    {
        $admin = Auth::user();
        $meal = Meal::find($id);

        // Validate request
        $this->validateMeal($request);
        
        // Authorize request
        if ($admin->cant('update', $meal))
        {
            return redirect()->route('admin.meal.list');
        }

        // Retrive form values
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $active = $request->input('availability') ? 1 : 0;

        // Update model
        $meal->name = $name;
        $meal->description = $description;
        $meal->price = $price;
        $meal->availability = $active;

        // If there's new image then replace old image
        if ($image = $request->file('image')) 
        {
            Storage::delete($meal->image);
            $path = Storage::putFile('public/images', $image);
            $meal->image = $path;
        }

        // Update Database
        $meal->save();

        // Continue to list with status
        return redirect()->back()->with('status', trans('meal.updated'));
    }

    private function validateMeal(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric', 'min:1', 'max:100'],
            'image' => ['image', 'mimes:jpeg,png', 'max:2048'],
        ]);
    }
}
