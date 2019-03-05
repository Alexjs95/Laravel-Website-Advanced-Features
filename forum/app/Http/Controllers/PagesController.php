<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function indexPage() {
        return view('pages.index');     // return index page
    }

    public function aboutPage() {
        return view('pages.about');     // return about page
    }
}

