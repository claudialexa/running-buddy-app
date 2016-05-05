<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\Answer;
use App\Song;

class myController extends Controller{

	public function questions() {
    	$questions = Question::all();
    	$answers = Answer::all();
    	return view('questions', ["questions" => $questions, "answers" => $answers]);
    }

    public function new_question(Request $request) {
    	$question = new Question;
    	$question->question = $request->question;
    	$question->district_id = $request->district_id;
    	$question->save();
    	$questions = Question::all();
    	return view('questions', ["questions" => $questions]);
    }



    public function answers() {
    	$answers = Answer::all();
    	return view('answers', ["answers" => $answers]);
    }

    public function new_answer(Request $request) {
    	$answer = new Answer;
    	$answer->answer = $request->answer;
    	$answer->correct = $request->correct;
    	$answer->save();
    	$answers = Answer::all();
    	return view('answers', ["answers" => $answers]);
    }

    public function add_song(Request $request) {
        $song = new Song;
        $song->track_id = $request->get('id');
        //$song->user_id = $request->get('user_id');
        $song->uri = $request->get('uri');
        $song->permalink_url = $request->get('url');
        $song->title = $request->get('title');
        
        $song->save();
        return response()->json(['success' => true, 'msg' => 'Song added into your account!']);
    }

    public function songs_json() {
        $songs = Song::all();
            return response() ->json($songs);
    }


}
