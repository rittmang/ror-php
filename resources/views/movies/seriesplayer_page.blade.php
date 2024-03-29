<!doctype html>
<html lang="en-US">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161216442-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-161216442-1');

    </script>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S{{ $ep->season }}E{{ $ep->episode }} | {{$ep->ep_name}} | {{ $title->name }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../../../movie/images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../../movie/css/bootstrap.min.css" />
    <!-- Typography CSS -->
    <link rel="stylesheet" href="../../../../movie/css/typography.css">
    <!-- Style -->
    <link rel="stylesheet" href="../../../../movie/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css" crossorigin="anonymous">
    <!-- Responsive -->
    <link rel="stylesheet" href="../../../../movie/css/responsive.css" />
    <script src="https://kit.fontawesome.com/c893428da3.js" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="40X40" href="/favicon-movies.png">
    <link rel="icon" type="image/png" sizes="40X40" href="/favicon-movies.png">

</head>

<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- Header -->
    <header id="main-header">
        <div class="main-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <!-- <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <div class="navbar-toggler-icon" data-toggle="collapse">
                           <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                           <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                           <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                        </div>
                     </a> -->
                            <a class="navbar-brand" href="{{ url('/') }}"> <img class="img-fluid logo"
                                    src="../../../../movie/images/logo.png" alt="streamit" /> </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="menu-main-menu-container">

                                </div>
                            </div>
                            <div class="mobile-more-menu">
                                <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton"
                                    data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-more-line"></i>
                                </a>
                                <div class="more-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="navbar-right position-relative">
                                        <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                            <li>
                                                <a href="#" class="search-toggle">
                                                    <i class="ri-search-line"></i>
                                                </a>
                                                <div class="search-box iq-search-bar">
                                                    <form action="#" class="searchbox">
                                                        <div class="form-group position-relative">
                                                            <input type="text" class="text search-input font-size-12"
                                                                placeholder="type here to search...">
                                                            <i class="search-link ri-search-line"></i>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                            <li onclick="location.href='/logout';" class="nav-item"
                                                style="cursor: pointer;">Logout ({{ Auth::user()->name }})
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="navbar-right menu-right">
                                <ul class="d-flex align-items-center list-inline m-0">
                                    <li class="nav-item nav-icon">
                                        <a href="#" class="search-toggle device-search">
                                            <i class="ri-search-line"></i>
                                        </a>
                                        <div class="search-box iq-search-bar d-search">
                                            <form action="#" class="searchbox">
                                                <div class="form-group position-relative">
                                                    <input type="text" class="text search-input font-size-12"
                                                        placeholder="type here to search...">
                                                    <i class="search-link ri-search-line"></i>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                    <li onclick="location.href='/logout';" class="nav-item" style="cursor: pointer;">
                                        Logout ({{ Auth::user()->name }})
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="nav-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Banner Start -->
    <div class="video-container iq-main-slider">
        @production
            <video class="video d-block" controls controlsList="nodownload" autoplay poster="{{ $ep->wide_poster }}"
                preload="auto" crossorigin="anonymous">
                <source src="{{ $ep->asset }}" type="video/mp4">
                <track label="English" kind="subtitles" src="{{ $ep->vtt }}" srclang="en">
            </video>
        @endproduction

        @env('local')
            <video class="video d-block" controls controlsList="nodownload" autoplay poster="{{ $ep->wide_poster }}"
                preload="auto">
                <source src="{{ $ep->asset }}" type="video/mp4">
                <track label="English" kind="subtitles" src="{{ $ep->vtt }}" srclang="en">
            </video>
        @endenv

    </div>

    <!-- Banner End -->
    <!-- MainContent -->
    <div class="main-content">
        <section class="movie-detail container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-info season-info g-border">
                        <p id="view_count_text"><i class='fa fa-eye'> </i> {{ $views }}</p>
                        <a class="btn btn-danger" href="/webseries/castplayer/{{$title->id}}/{{$ep->season}}/{{$ep->episode}}" role="button">
                            <i class='fa fa-television'> </i>
                        </a>
                        <pre id="details"></pre>

                        <h4 class="trending-text big-title text-uppercase mt-0">{{ $title->name }}</h4>
                        <div class="d-flex align-items-center text-white text-detail episode-name mb-0">
                            <span>S{{ $ep->season }}E{{ $ep->episode }}</span>
                            <span class="trending-year">{{ $ep->ep_name }}</span>
                        </div>
                        <p class="trending-dec w-100 mb-0">{{ $title->description }}</p>
                        <br />
                        @if (!empty($next_ep))
                            <h5 class="text-uppercase mt-0" style="color:Red;">Up next</h5>
                            <br />
                            <p class="trending-dec w-100 mb-0">
                                <a href="../{{ $next_ep->season }}/{{ $next_ep->episode }}">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    S{{ $next_ep->season }}E{{ $next_ep->episode }} | {{ $next_ep->ep_name }}
                                </a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- <footer class="mb-0">
      <div class="container-fluid">
         <div class="block-space">
            <div class="row">
               <div class="col-lg-3 col-md-4">
                  <ul class="f-link list-unstyled mb-0">
                     <li><a href="#">About Us</a></li>
                     <li><a href="movie-category.html">Movies</a></li>
                     <li><a href="show-category.html">Tv Shows</a></li>
                     <li><a href="#">Coporate Information</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-4">
                  <ul class="f-link list-unstyled mb-0">
                     <li><a href="#">Privacy Policy</a></li>
                     <li><a href="#">Terms & Conditions</a></li>
                     <li><a href="#">Help</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-4">
                  <ul class="f-link list-unstyled mb-0">
                     <li><a href="#">FAQ</a></li>
                     <li><a href="#">Cotact Us</a></li>
                     <li><a href="#">Legal Notice</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-12 r-mt-15">
                  <div class="d-flex">
                     <a href="#" class="s-icon">
                        <i class="ri-facebook-fill"></i>
                     </a>
                     <a href="#" class="s-icon">
                        <i class="ri-skype-fill"></i>
                     </a>
                     <a href="#" class="s-icon">
                        <i class="ri-linkedin-fill"></i>
                     </a>
                     <a href="#" class="s-icon">
                        <i class="ri-whatsapp-fill"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="copyright py-2">
         <div class="container-fluid">
            <p class="mb-0 text-center font-size-14 text-body">STREAMIT - 2020 All Rights Reserved</p>
         </div>
      </div>
   </footer> -->
    <!-- MainContent End-->
    <!-- back-to-top -->
    @include('movies/noticealert')

    <div id="back-to-top">
        <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
    </div>


    <!-- back-to-top End -->
    <!-- jQuery, Popper JS -->

    <script src="../../../../movie/js/jquery-3.4.1.min.js"></script>
    <script src="../../../../movie/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../../../../movie/js/bootstrap.min.js"></script>
    <!-- Slick JS -->
    <script src="../../../../movie/js/slick.min.js"></script>
    <!-- owl carousel Js -->
    <script src="../../../../movie/js/owl.carousel.min.js"></script>
    <!-- select2 Js -->
    <script src="../../../../movie/js/select2.min.js"></script>
    <!-- Magnific Popup-->
    <script src="../../../../movie/js/jquery.magnific-popup.min.js"></script>
    <!-- Slick Animation-->
    <script src="../../../../movie/js/slick-animation.min.js"></script>
    <!-- Custom JS-->
    <script src="../../../../movie/js/custom.js"></script>
    <script>
        const video = document.querySelector('video');
        function updateMetadata(){
            navigator.mediaSession.metadata = new MediaMetadata({
                title:"S"+{!! json_encode($ep->season,JSON_HEX_TAG) !!}+"E"+{!! json_encode($ep->episode,JSON_HEX_TAG) !!}+" | "+{!! json_encode($ep->ep_name,JSON_HEX_TAG) !!},
                artist:{!! json_encode($title->name,JSON_HEX_TAG) !!}+" on ROR Movies",
                artwork:[{
                src:{!! json_encode($ep->wide_poster,JSON_HEX_TAG) !!},sizes:'1280X720',type:'image/jpg'
                }]
            });
            updatePositionState();
        }

        function updatePositionState(){
            if('setPositionState' in navigator.mediaSession){
                console.log("Updating position state");
                navigator.mediaSession.setPositionState({
                duration:video.duration,
                playbackRate:video.playbackRate,
                position:video.currentTime,
                });
            }
        }
        let defaultSkipTime=10;
        navigator.mediaSession.setActionHandler('seekbackward', function(event) {
        const skipTime = event.seekOffset || defaultSkipTime;
        video.currentTime = Math.max(video.currentTime - skipTime, 0);
        updatePositionState();
        });

        navigator.mediaSession.setActionHandler('seekforward', function(event) {
        const skipTime = event.seekOffset || defaultSkipTime;
        video.currentTime = Math.min(video.currentTime + skipTime, video.duration);
        updatePositionState();
        });
        navigator.mediaSession.setActionHandler('seekto', (details) => {
        if (details.fastSeek && 'fastSeek' in video) {
            // Only use fast seek if supported.
            video.fastSeek(details.seekTime);
            updatePositionState();
            return;
        }
        video.currentTime = details.seekTime;
        // TODO: Update playback state.
        });

        /* Play & Pause */

        navigator.mediaSession.setActionHandler('play', async function() {
        await video.play();
        navigator.mediaSession.playbackState = "playing";
        // Do something more than just playing video...
        });

        navigator.mediaSession.setActionHandler('pause', function() {
        video.pause();
        navigator.mediaSession.playbackState = "paused";
        // Do something more than just pausing video...
        });
    </script>
     <script type="text/javascript">
        let watch_title_id={!! json_encode($title->id,JSON_HEX_TAG) !!};
        let watch_ep_id={!! json_encode($ep->id,JSON_HEX_TAG) !!};
        var vid=document.getElementsByClassName("video")[0];
        vid.addEventListener('loadedmetadata',function(){
            this.currentTime={!! json_encode($lastWatched,JSON_HEX_TAG) !!};
            updateMetadata();
        },false);
        function updateWatchTime(){
            if(!vid.paused && !vid.waiting && (vid.duration-vid.currentTime)>60){
                $.ajax({
                    url:'/profile/continue-watching',
                    type:'POST',
                    data:{
                        "_token":"{{csrf_token()}}",
                        "watch_title_id":watch_title_id,
                        "watch_episode_id":watch_ep_id,
                        "watch_time":Math.floor(vid.currentTime),
                    },
                    error:function(data){
                        alert(data.responseText);
                    }
                });
            }
            if((vid.duration-vid.currentTime)<60){
                $.ajax({
                    url:'/profile/continue-watching',
                    type:'DELETE',
                    data:{
                        "_token":"{{csrf_token()}}",
                        "watch_title_id":watch_title_id,
                        "watch_episode_id":watch_ep_id
                    },
                    error:function(data){
                        alert(data.responseText);
                    }
                });
                clearInterval(uWT);
            }
        }
        var uWT=setInterval(updateWatchTime,10000);    
    </script>
</body>

</html>
