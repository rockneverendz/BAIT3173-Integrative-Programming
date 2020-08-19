<?php

namespace App\Http\Controllers\Admin\Meal;

use App\Http\Controllers\Controller;
use Mtownsend\ResponseXml\Providers\ResponseXmlServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Meal;
use App\Admin;
use Auth;

class XMLController extends Controller
{
    public function index()
    {

        $meal = Meal::all()->toArray();

        $meal = [
            'menu' => [
                'meal' => [
                    [$meal]
                ],
            ],
        ];

        return response()->xml($meal);

    }
}
