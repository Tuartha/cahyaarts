<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::first();

        return view('frontend.about', compact('aboutPage'));
    }
}
