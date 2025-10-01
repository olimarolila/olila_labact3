<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function browse()
    {
        return view('guest.browse');
    }

    public function about()
    {
        return view('guest.about');
    }

    public function faq()
    {
        return view('guest.faq');
    }

    public function feedback()
    {
        return view('guest.feedback');
    }

    public function events()
    {
        return view('guest.events');
    }  

}
