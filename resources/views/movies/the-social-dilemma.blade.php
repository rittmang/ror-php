
<!doctype html>
<html lang="en-US">

<head>
   <!-- Required meta tags -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>The Social Dilemma</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="../movie/images/favicon.ico" />
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="../movie/css/bootstrap.min.css" />
   <!-- Typography CSS -->
   <link rel="stylesheet" href="../movie/css/typography.css">
   <!-- Style -->
   <link rel="stylesheet" href="../movie/css/style.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
   <!-- Responsive -->
   <link rel="stylesheet" href="../movie/css/responsive.css" />
   <script src="https://kit.fontawesome.com/c893428da3.js" crossorigin="anonymous"></script>
   <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>
   <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-database.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@fingerprintjs/fingerprintjs@2/dist/fingerprint2.min.js"></script>
   

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
                  <a class="navbar-brand" href="{{url('movies')}}"> <img class="img-fluid logo" src="../movie/images/logo.png"
                           alt="streamit" /> </a>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="menu-main-menu-container">
                           
                        </div>
                     </div>
                     <div class="mobile-more-menu">
                        <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton" data-toggle="more-toggle"
                           aria-haspopup="true" aria-expanded="false">
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
      <video class="video d-block" controls autoplay poster="../movie/images/slider/slider1.jpg" preload="auto">
         <source src="https://td.angerycat.tk/Aria/The%20Social%20Dilemma%20(2020)%20%5B1080p%5D%20%5BWEBRip%5D%20%5B5.1%5D%20%5BYTS.MX%5D/The%20Social%20Dilemma%20(2020)%20%5B1080p%5D%20%5BWEBRip%5D%20%5B5.1%5D%20%5BYTS.MX%5D/The.Social.Dilemma.2020.1080p.WEBRip.x264.AAC5.1-%5BYTS.MX%5D.mp4" type="video/mp4">
            <track label="English" kind="subtitles" src="../subtitles/tsd2020.vtt" srclang="en">
      </video>
   </div>
   
   <!-- Banner End -->
   <!-- MainContent -->
   <div class="main-content">
      <section class="movie-detail container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="trending-info season-info g-border">
                  <p id="view_count_text"><i class='fa fa-eye'>  </i>  {{$views}} </p> 
                  {{-- <p>Browser fingerprint: <p id="fp"></p></p> --}}
                  <pre id="details"></pre>                 
                  <h4 class="trending-text big-title text-uppercase mt-0">The Social Dilemma</h4>
                  <div class="d-flex align-items-center text-white text-detail episode-name mb-0">
                     <span>Documentary</span>
                     <span class="trending-year">2020</span>
                  </div>
                  <p class="trending-dec w-100 mb-0">We tweet, we like, and we share— but what are the consequences of our growing dependence on social media? As digital platforms increasingly become a lifeline to stay connected, Silicon Valley insiders reveal how social media is reprogramming civilization by exposing what’s hiding on the other side of your screen.</p>
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
   
   <script src="../movie/js/jquery-3.4.1.min.js"></script>
   <script src="../movie/js/popper.min.js"></script>
   <!-- Bootstrap JS -->
   <script src="../movie/js/bootstrap.min.js"></script>
   <!-- Slick JS -->
   <script src="../movie/js/slick.min.js"></script>
   <!-- owl carousel Js -->
   <script src="../movie/js/owl.carousel.min.js"></script>
   <!-- select2 Js -->
   <script src="../movie/js/select2.min.js"></script>
   <!-- Magnific Popup-->
   <script src="../movie/js/jquery.magnific-popup.min.js"></script>
   <!-- Slick Animation-->
   <script src="../movie/js/slick-animation.min.js"></script>
   <!-- Custom JS-->
   <script src="../movie/js/custom.js"></script>
</body>

 {{-- <script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=get_viewers_ip"></script>
  --}}
  <script>
     var hasConsole=typeof console !== "undefined"
     var fingerprintReport=function(){
        var d1=new Date()
        Fingerprint2.get(function(components){
           var murmur=Fingerprint2.x64hash128(components.map(function(pair){return pair.value}).join(),31)
           var d2=new Date()
           var time=d2-d1
         //   document.querySelector("#fp").textContent=murmur;
           $.ajax({
              url:'/movies/the-social-dilemma',
              type:'POST',
              data:{_token:"{{csrf_token()}}",murmur:murmur},
            //   success:function(){alert("Sent murmur to controller");}
           });
           
        })
     }
     var cancelId
     var cancelFunction

     if(window.requestIdleCallback){
        cancelId=requestIdleCallback(fingerprintReport)
        cancelFunction=cancelIdleCallback
     }else{
        canceldId=setTimeout(fingerprintReport,500)
        cancelFunction=clearTimeout
     }

     if(cancelId){
        cancelFunction(cancelId)
        cancelId=undefined
     }
     fingerprintReport()
     
  </script>
</html>