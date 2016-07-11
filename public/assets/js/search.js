// Called automatically when JavaScript client library is loaded.
function onClientLoad() {
    gapi.client.load('youtube', 'v3', onYouTubeApiLoad);
}

// Called automatically when YouTube API interface is loaded (see line 9).
function onYouTubeApiLoad() {
    // This API key is intended for use only in this lesson.
    // See https://goo.gl/PdPA1 to get a key for your own applications.
    gapi.client.setApiKey('AIzaSyBINamLjjODofiAy2LqFmCOl2cGIb6s6Ts');

    //search();
}

// After the API loads, call a function to enable the search box.
function handleAPILoaded() {
    $('#search-button').attr('disabled', false);
}

// Search for a specified string.
function search() {
    $("#search-container").html("");
    var q = $('#query').val();
    var request = gapi.client.youtube.search.list({
        q: q,
        part: 'snippet',
        type: 'video'
    });

    request.execute(function(response) {
        var videos = response.result;
        $.each(videos.items, function (index, video) {
            var html = '<div class="row items"><img src="'+video.snippet.thumbnails.default.url +'"> '+
                '<div style="display: inline-block"><label for="">Title: </label>'+ video.snippet.title  +
                '<br><label> Video Id: </label>'+ video.id.videoId + '</div></div>';
            $("#search-container").append(html);
        });
       // $('#search-container').html('<pre>' + str + '</pre>');
    });
}

