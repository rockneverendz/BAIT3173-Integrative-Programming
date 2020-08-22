<?php

namespace App\Http\Controllers\Admin\Meal;

use App\Http\Controllers\Controller;
use Mtownsend\ResponseXml\Providers\ResponseXmlServiceProvider;
use Spatie\ArrayToXml\ArrayToXml;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Meal;
use App\Admin;
use Auth;

class XMLController extends Controller
{
    public function listMeals()
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

    public function renderMeals()
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
