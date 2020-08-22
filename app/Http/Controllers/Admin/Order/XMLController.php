<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Mtownsend\ResponseXml\Providers\ResponseXmlServiceProvider;
use Spatie\ArrayToXml\ArrayToXml;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Meal;
use App\Order;
use App\Orderlist;
use App\Admin;
use Auth;

class XMLController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function listOrders()
    {

        $meallist = Meal::where('admin_id','=', Auth::id())->pluck('id')->toArray();
        $orderlist = Orderlist::whereIn('meal_id', $meallist)->get()->toArray();
        
        $array = [
            'menu' => [
                'meal' => [
                    [$orderlist]
                ],
            ],
        ];

        return response()->xml($array);
    }

    public function renderOrders()
    {

        $meal = Meal::all()->toArray();

        $meal = [
            'menu' => [
                'meal' => [
                    [$meal]
                ],
            ],
        ];
        
        // Load XML file
        $xml = new \DOMDocument;
        $xml->loadXML(ArrayToXml::convert($meal));

        // Load XSL file
        $xsl = new \DOMDocument;
        $xsl->load('xsl\renderMeals.xsl');

        // Configure the transformer
        $proc = new \XSLTProcessor;

        // Attach the xsl rules
        $proc->importStyleSheet($xsl);

        // Transform
        echo $proc->transformToXML($xml);
    }
}
