@extends('layouts.master')
            
            @section('column-a')
              <div class="col-md-6">

                <h2>New Trivia Question</h2>
                    {!! Form::open(array('url' => '/answers', 'files' => true)) !!}
                    {!! Form::open(array('url' => '/questions', 'files' => true)) !!}
                    {!! Form::text('q_id', 'Write the Question ID') !!}
                    {!! Form::text('a_id', '1') !!} {!! Form::text('answer', 'Write your Answer Here') !!} 
                    {!! Form::text('correct', 'Number for Correct') !!}
                    {!! Form::submit('Create Answers'); !!}
                    {!! Form::close() !!}
                </div>
            @stop
            
            @section('column-b')
        
            <div class="col-md-6">
                <h2>Trivia Questions and Answers</h2>
                @foreach($answers as $answer)
                    <h5>Question: {!! $question->question !!} Question id: {!! $question->q_id !!}</h5>
                    <h5>Question District: {!! $question->district_id !!}</h5>
                @endforeach
            </div>
            @stop
