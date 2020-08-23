<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Mtownsend\ResponseXml\Providers\ResponseXmlServiceProvider;
use Spatie\ArrayToXml\ArrayToXml;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Meal;
use App\Order;
use App\Orderlist;
use App\Admin;
use App\User;
use App\Reload;
use Auth;

class XMLController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function renderUsers()
    {

        $users = User::get()->toArray();
        
        $array = [
            'user' => [
                    [$users]
            ],
        ];
        
        //return response()->xml($array);
        
        // Load XML file
        $xml = new \DOMDocument;
        $xml->loadXML(ArrayToXml::convert($array));

        // Load XSL file
        $xsl = new \DOMDocument;
        $xsl->load('xsl\renderUser.xsl');

        // Configure the transformer
        $proc = new \XSLTProcessor;

        // Attach the xsl rules
        $proc->importStyleSheet($xsl);

        // Transform
        echo $proc->transformToXML($xml);
    }
}
