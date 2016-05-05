@extends('layouts.app')

@section('content')
   
    @section('column-b')
    <div class="col-md-12">
        <h2>My Feed</h2>
        Filter By: <button class="btn btn-info workout" id="light">Light</button>
        <button class="btn btn-warning workout" id="moderate">Moderate</button>
        <button class="btn btn-danger workout" id="intense">Intense</button>

    @foreach($songs as $song)

        <h4>Title: {!! $song->title !!}</h5>
        <p>Access Song: <a>{!! $song->uri !!}</a></br>
        Artwork URL: <a>{!! $song->artwork_url !!}</a></br>
        Playlist: Light</p>
    @endforeach

    </div>
    @stop

  @endsection

<script src="https://connect.soundcloud.com/sdk/sdk-3.0.0.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
