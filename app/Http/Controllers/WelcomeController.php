<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Song;

class WelcomeController extends Controller{

public function feed() {
	$songs = Song::all();
	return view ('feed', ["songs" => $songs]);
}

public function search() {
	return view ('search');
}

}
