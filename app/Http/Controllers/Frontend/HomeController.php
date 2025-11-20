<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homePage = HomePage::first();

        return view('frontend.home', compact('homePage'));
    }
}
