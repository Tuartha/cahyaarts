<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use App\Models\HomePage;
use App\Models\AboutPage;
use App\Models\ContactPage;
use App\Models\GalleryPage;
use App\Models\ServicePage;
use App\Models\GalleryItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactItems;

class HomeController extends Controller
{
    public function index()
    {
        $homePage = HomePage::first();
        $aboutPage = AboutPage::first();
        $servicePage = ServicePage::first();
        $services = Service::active()->get();
        $galleryPage = GalleryPage::first(); 
        $gallery = GalleryItems::active()->get();
        $contactPage = ContactPage::first();
        $contactItems = ContactItems::all();

        return view('frontend.home', compact(
            'homePage',
            'aboutPage',
            'servicePage',
            'services',
            'galleryPage',
            'gallery',
            'contactPage',
            'contactItems'
        ));
    }
}
