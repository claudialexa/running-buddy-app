@extends('layouts.app')

@section('content')

    @section('column-c')
    <div class="col-md-12">
        <div class="input-group">
            <input type="text search" id="searchBox" class="form-control searchBox" placeholder="Search for tracks">
                <span class="input-group-btn">
                <button onclick="audioResults()" class="btn btn-default" type="button">Search</button>
                </span>
         </div>

    </div>
    @stop
             
    @section('column-b')
    <div class="col-md-12">
        <h2>Search Results</h2>
        <div id="songsContainer">
         <div class="songlistContainer" id="songlistContainer"></div>
        </div>
    </div>
    @stop


<script src="https://connect.soundcloud.com/sdk/sdk-3.0.0.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script>
SC.initialize({
  client_id: 'eca915110e7a0f717263708824e35838',
  redirect_uri: 'http://homestead.app/callback'
});

var searchText = $('#searchBox').val();
var songlistContainer = document.getElementById('songlistContainer');

// initiate auth popup
SC.connect().then(function() {
  return SC.get('/me');
}).then(function(me) {
  alert('Hello, ' + me.username + ' youre online!');
});

jQuery(document).ready(function($){
  $(document).on('submit', '.song-form', function(e){
    e.preventDefault();
    var form = $(this);
      $.ajax({
        type: "POST",
        url: form.attr('action'),
        data: form.serialize(),
        success: function(response) {
            if(!response.success) {
                alert(response.error);
            }
            else {
                alert(response.msg);
            }
        },
        error: function(jqXhr) {
            alert('Error in upload')
        }
    });
  });
});


function audioResults(){
    var searchText = $('#searchBox').val();
    SC.get('/tracks', {q: searchText} ).then(function(tracks){
      tracks.forEach(function(track){
          var html = "<form action='add/song' class='song-form' method='POST'>";
          html += "<input name='id' type='hidden' value=" + track.id + ">";
          html += "<input name='title' type='hidden' value=" + track.title + ">";
          html += "<input name='url' type='hidden' value=" + track.permalink_url + ">";
          html += "<input name='uri' type='hidden' value=" + track.uri + ">";
          html += "<input type='submit' class='add-song-btn'></form>";


          $('#songlistContainer').append('<p>' + track.id + ' Track Title: ' + track.title + '<br/>' + track.permalink_url + '<br/>' +  'Track URL: ' + track.uri + '<br/>' + 'By user:' +  track.user_id + '<br/>' + '</p>' + html);
      });
    });
}

</script>
