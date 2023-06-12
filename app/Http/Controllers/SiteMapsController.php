<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class SiteMapsController extends Controller
{
    public function main_sitemap()
    {
        return response()->view('frontend.main-sitemap')->header('Content-Type', 'text/xml');
    }

}
