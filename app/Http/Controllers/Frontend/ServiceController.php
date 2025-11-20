<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServicePage;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $servicePage = ServicePage::first();
        $serviceItems = Service::active()->get();

        return view('frontend.service', compact('servicePage', 'serviceItems'));
    }
}
