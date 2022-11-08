<?php

namespace EasyShop\Http\Controllers;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;

class SitemapController extends Controller
{

    public function index(){
        return response(file_get_contents(resource_path('views/clients/' . config( 'app.client').'/sitemap_xml/sitemap.xml')), 200,
            [
            'Content-Type' => 'application/xml'
        ]);

    }
}
