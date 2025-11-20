<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactPage;
use App\Models\ContactItems;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactPage = ContactPage::first();
        $contactItems = ContactItems::all();

        return view('frontend.contact', compact('contactPage', 'contactItems'));
    }
}
