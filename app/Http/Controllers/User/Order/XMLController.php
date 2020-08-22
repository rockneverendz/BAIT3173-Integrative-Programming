<?php

namespace App\Http\Controllers\User\Order;

use App\Http\Controllers\Controller;
use Mtownsend\ResponseXml\Providers\ResponseXmlServiceProvider;
use Spatie\ArrayToXml\ArrayToXml;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Meal;
use App\Order;
use App\Orderlist;
use App\Admin;
use App\Reload;
use Auth;

class XMLController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function renderOrders()
    {
        $orders = Auth::user()->orders()->orderBy('created_at','desc')->get()->toArray();
        
        $array = [
            'order' => [
                    [$orders]
            ],
        ];
        
        //return response()->xml($array);
        
        // Load XML file
        $xml = new \DOMDocument;
        $xml->loadXML(ArrayToXml::convert($array));

        // Load XSL file
        $xsl = new \DOMDocument;
        $xsl->load('xsl\renderUserOrder.xsl');

        // Configure the transformer
        $proc = new \XSLTProcessor;

        // Attach the xsl rules
        $proc->importStyleSheet($xsl);

        // Transform
        echo $proc->transformToXML($xml);
    }
}
