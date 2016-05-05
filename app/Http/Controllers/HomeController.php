<?php

namespace App\Http\Controllers;

use Soundcloud;

class HomeController extends Controller
{
    public function index()
    {
        echo Soundcloud::getAuthUrl();
    }
    public function callback() {
    	return view('callback');
    }
}