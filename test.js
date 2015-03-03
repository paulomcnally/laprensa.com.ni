var youTubeURL = 'http://gdata.youtube.com/feeds/api/playlists/PLLSDIHSJqOp3qfRVJLgaksJyQC4YM9FGD?v=2&alt=json';
var json = (function() {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': youTubeURL,
        'dataType': "json",
        'success': function(data) {
            json = data;
        }
    });
    return json;
})();

alert("Title: " + json.entry.title.$t +"\nDescription:\n " + json.entry.media$group.media$description.$t + "\n");
