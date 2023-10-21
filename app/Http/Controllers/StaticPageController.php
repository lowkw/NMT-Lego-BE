<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    //
    /**
     * Show the privacy page.
     *
     */
    public function privacy()
    {
        return view('static.privacy');
    }
}
