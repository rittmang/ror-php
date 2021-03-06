<!DOCTYPE html>
<html>

<head>
    <title>{{ $title->name }}</title>
    <link rel="icon" type="image/x-icon" href="../../movie/images/favicon.ico" />
    <link rel="icon" type="image/png" href="../../movie/images/imagefiles/favicon_16x16.png" />
    <link rel="icon" type="image/png" href="../../movie/images/imagefiles/favicon_32x32.png" />
    <link rel="icon" type="image/png" href="../../movie/images/imagefiles/favicon_64x64.png" />
    <link rel="stylesheet" type="text/css" href="../../movie/css/CastVideos.css">
    <link href='//fonts.googleapis.com/css?family=Roboto&subset=latin,cyrillic-ext,greek-ext,latin-ext' rel='stylesheet'
        type='text/css'>
</head>

<body>

    <div id="main_video">
        <div class="imageSub">
            <!-- Put Your Image Width -->
            <div class="blackbg" id="playerstatebg">IDLE</div>
            <div class=label id="playerstate">IDLE</div>
            <img src="{{ $title->wide_poster }}" id="video_image">
            <div id="video_image_overlay"></div>
            <video id="video_element">
            </video>
        </div>

        <div id="media_control">
            <div id="play"></div>
            <div id="pause"></div>
            <div id="progress_bg"></div>
            <div id="progress"></div>
            <div id="progress_indicator"></div>
            <div id="fullscreen_expand"></div>
            <div id="fullscreen_collapse"></div>
            <google-cast-launcher id="castbutton"></google-cast-launcher>
            <div id="audio_bg"></div>
            <div id="audio_bg_track"></div>
            <div id="audio_indicator"></div>
            <div id="audio_bg_level"></div>
            <div id="audio_on"></div>
            <div id="audio_off"></div>
            <div id="duration">00:00:00</div>
        </div>
    </div>

    <div id="media_info">
        <div id="media_title">
        </div>
        <div id="media_subtitle">
        </div>
        <div id="media_desc">
        </div>
    </div>
    <div id="carousel">
    </div>
    <script src="../../movie/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        var mediaJSON = {
            'categories': [{
                'name': 'Movies',
                'videos': [{
                    'token':{!! json_encode(csrf_token(),JSON_HEX_TAG) !!},
                    'id':{!! json_encode($title->id,JSON_HEX_TAG) !!},
                    'lastWatched':{!! json_encode($lastWatched,JSON_HEX_TAG) !!},
                    'description': {!! json_encode($title->description, JSON_HEX_TAG) !!},
                    'sources': [{!! json_encode($title->asset, JSON_HEX_TAG) !!}],
                    'subtitle': {!! json_encode($title->vtt, JSON_HEX_TAG) !!},
                    'thumb': {!! json_encode($title->wide_poster, JSON_HEX_TAG) !!},
                    'title': {!! json_encode($title->name, JSON_HEX_TAG) !!},
                    'long_poster': {!! json_encode($title->long_poster, JSON_HEX_TAG) !!},
                    'type': {!! json_encode($title->type, JSON_HEX_TAG) !!},
                    'year': {!! json_encode($title->year, JSON_HEX_TAG) !!}
                }]
            }]
        };

    </script>
    <script src="../../movie/js/CastVideos.js"></script>
    <script type="text/javascript">
        var castPlayer = new CastPlayer();
        window['__onGCastApiAvailable'] = function(isAvailable) {
            if (isAvailable) {
                castPlayer.initializeCastPlayer();
            }
        };

    </script>
    <script type="text/javascript" src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js?loadCastFramework=1">
    </script>

</body>

</html>
