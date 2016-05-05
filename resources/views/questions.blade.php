@extends('layouts.master')
            
            @section('column-a')
              <div class="col-md-6">

                <h2>New Trivia Question</h2>
                    {!! Form::open(array('url' => '/questions', 'files' => true)) !!}
                    {!! Form::text('question', 'Write your Question Here') !!}
                    {!! Form::text('district_id', 'District Name') !!}
                    {!! Form::text('q_id', 'Question ID') !!}
                    {!! Form::submit('Create Question'); !!}
                    {!! Form::close() !!}
                </div>

                <h2>Answers</h2>
                    {!! Form::open(array('url' => '/answers', 'files' => true)) !!}
                    {!! Form::text('question', 'Write your Question Here') !!}
                    {!! Form::text('district_id', 'District Name') !!}
                    {!! Form::submit('Create Question'); !!}
                    {!! Form::close() !!}
                </div>
            @stop
            
            @section('column-b')
        
            <div class="col-md-6">
                <h2>Trivia Questions</h2>
                @foreach($questions as $question)
                    <h5>Question: {!! $question->question !!} Question id: {!! $question->q_id !!}</h5>
                @endforeach
                @foreach($answers as $answer)
                    <h5>Answers: {!! $answer->answer !!} Correct: {!! $answer->correct !!}</h5>
                @endforeach
            </div>
            @stop
