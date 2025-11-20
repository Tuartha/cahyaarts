<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GalleryPage;
use App\Models\GalleryItems;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryPage = GalleryPage::first();
        $galleryItems = GalleryItems::where('is_active', true)
            ->latest()
            ->paginate($galleryPage->items_to_display ?? 12);;
        
        return view('frontend.gallery', compact('galleryPage', 'galleryItems'));
    }
}
