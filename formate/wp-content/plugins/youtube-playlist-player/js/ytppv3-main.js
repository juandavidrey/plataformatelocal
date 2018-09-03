/**
 * Create a playlist based on an array of YouTube video IDs
 */
function ytCreatePlaylist() {
    var ytApiKey = document.querySelector('.yt-api-container').dataset.apikey,
        videoId = document.querySelector('.yt-api-container').dataset.vdid,
        httpRequest = new XMLHttpRequest();

    // https://developers.google.com/youtube/v3/docs/videos/list
    httpRequest.open('GET', "https://www.googleapis.com/youtube/v3/videos?part=snippet&fields=items(id,snippet)&id=" + videoId + "&key=" + ytApiKey, true);
    httpRequest.onreadystatechange = function (data) {
        if (httpRequest.readyState === 4) {
            data = JSON.parse(httpRequest.responseText);

            var videoId = videoId = document.querySelector('.yt-api-container').dataset.vdid,
                videoArray = videoId.split(','),
                videoElement;

            videoArray.forEach(function (item, index) {
                videoElement = '<div class="yt-api-video-item yt-' + data.items[index].id + '" data-id="' + data.items[index].id + '"><div class="yt-api-video-thumb"><img src="' + data.items[index].snippet.thumbnails.high.url + '" alt="' + data.items[index].snippet.title + '"></div><div class="yt-api-video-description">' + data.items[index].snippet.title + '</div></div>';

                document.querySelector('.yt-api-video-list').innerHTML += videoElement;
            });
        }
    };
    httpRequest.send();
}

/**
 * Check for DOM ready using a cross-browser compatible procedural function
 *
 * @link https://getbutterfly.com/dom-ready-functionality-using-vanilla-javascript/
 */
if (document.readyState !== 'loading') {
    if (document.querySelector('.yt-api-container')) {
        ytCreatePlaylist();
    }
} else if (document.addEventListener) {
    document.addEventListener('DOMContentLoaded', function() {
        if (document.querySelector('.yt-api-container')) {
            ytCreatePlaylist();
        }
    });
} else {
    document.attachEvent('onreadystatechange', function() {
        if (document.readyState !== 'loading') {
            if (document.querySelector('.yt-api-container')) {
                ytCreatePlaylist();
            }
        }
    });
}

/**
 * Change YouTube video based on playlist selection
 */
document.querySelector('.yt-api-video-item').addEventListener('click', function () {
    var ytUri = 'https://www.youtube.com',
        thisId = this.dataset.id;

    document.getElementById('vid_frame').src = ytUri + '/embed/' + thisId + '?autoplay=1&rel=0&showinfo=1&autohide=1';
});
