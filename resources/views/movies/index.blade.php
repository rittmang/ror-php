<!DOCTYPE html>
<html lang="en-US">
   <head>
      <!-- Required meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta property="og:title" content="RightOnRittman Movie Library">
      <meta property="og:url" content="https://rightonrittman.in/movies.html">
      <title>Movie Library</title>
      <!-- Favicon -->
      <!-- <link rel="shortcut icon" href="assets/movie/images/favicon.ico" /> -->
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="movie/css/bootstrap.min.css" />
      <!-- Typography CSS -->
      <link rel="stylesheet" href="movie/css/typography.css">
      <!-- Style -->
      <link rel="stylesheet" href="movie/css/style.css" />
      <!-- Responsive -->
      <link rel="stylesheet" href="movie/css/responsive.css" />
      
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Header -->
      <header id="main-header">
         <div class="main-header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <!-- <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                           data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                           aria-expanded="false" aria-label="Toggle navigation">
                           <div class="navbar-toggler-icon" data-toggle="collapse">
                              <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                              <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                              <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                           </div>
                        </a> -->
                        <a class="navbar-brand" href="movies"> <img class="img-fluid logo" src="movie/images/logo.png"
                           alt="streamit" /> </a>
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
                                    <li onclick="location.href='/logout';" class="nav-item" style="cursor: pointer;">Logout ({{Auth::user()->name}})
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
                              <li onclick="location.href='/logout';" class="nav-item" style="cursor: pointer;">Logout ({{Auth::user()->name}})
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
      <!-- Slider Start -->
      <section id="home" class="iq-main-slider p-0">
         <div id="home-slider" class="slider m-0 p-0">
            @foreach($banner_titles as $banner_title)
               <div class="slide slick-bg" style="background-image: url({{$banner_title->wide_poster}});">
                  <div class="container-fluid position-relative h-100">
                     <div class="slider-inner h-100">
                        <div class="row align-items-center  h-100">
                           <div class="col-xl-6 col-lg-12 col-md-12">
                              
                              <h2 class="slider-text big-title title text-uppercase" data-animation-in="fadeInLeft"
                                 data-delay-in="0.6">{{$banner_title->name}}</h2>
                              <div class="d-flex align-items-center" data-animation-in="fadeInUp" data-delay-in="1">
                                 <span class="badge badge-secondary p-2">{{$banner_title->age}}</span>
                                 <span class="ml-3">{{$banner_title->type}}</span>
                              </div>
                              <p data-animation-in="fadeInUp" data-delay-in="1.2">{{$banner_title->description}}</p>
                              <div class="d-flex align-items-center r-mb-23" data-animation-in="fadeInUp" data-delay-in="1.2">
                                 <a href="/movies/{{$banner_title->id}}" class="btn btn-hover"><i class="fa fa-play mr-2"
                                    aria-hidden="true"></i>Play Now</a>
                                 <!-- <a href="show-details.html" class="btn btn-link">More details</a> -->
                              </div>
                           </div>
                        </div>
                        @if($banner_title->trailer_link != null)
                        <div class="trailor-video">
                           <a href="{{$banner_title->trailer_link}}" class="video-open playbtn">
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 x="0px" y="0px" width="80px" height="80px" viewBox="0 0 213.7 213.7"
                                 enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                 <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10"
                                    points="73.5,62.5 148.5,105.8 73.5,149.1 " />
                                 <circle class='circle' fill="none" stroke-width="7" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3" />
                              </svg>
                              <span class="w-trailor">Watch Trailer</span>
                           </a>
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
         <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle"
               fill="none" stroke="currentColor">
               <circle r="20" cy="22" cx="22" id="test"></circle>
            </symbol>
         </svg>
      </section>
      <!-- Slider End -->
      <!-- MainContent -->
      <div class="main-content">
        
         <section id="iq-upcoming-movie">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">Upcoming Movies</h4>
                        <a href="/movies/all" class="text-primary">View all</a>
                     </div>
                     <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                           @foreach($upcoming_titles as $upcoming_title)
                              <li class="slide-item">
                                 
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{$upcoming_title->long_poster}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6>{{$upcoming_title->name}}</h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">N/A</div>
                                          </div>
                                       </div>
                                    </div>
                              </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
       
         <section id="iq-upcoming-movie">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">
                           From <img src="movie/images/disney.png" height="95">
                        </h4>
                     </div>
                     <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                           @foreach($disney_titles as $dis_title)
                              <li class="slide-item">
                                 <a href="/movies/{{$dis_title->id}}">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{$dis_title->long_poster}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6>{{$dis_title->name}}</h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">{{$dis_title->age}}</div>
                                             <span class="text-white">{{$dis_title->duration}}</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </span>
                                          </div>
                                       </div>
                                    
                                    </div>
                                 </a>
                              </li>
                              
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section id="iq-upcoming-movie">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">
                           From <img src="movie/images/pixar.png" height="95">
                        </h4>
                     </div>
                     <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                           @foreach($pixar_titles as $dis_title)
                              <li class="slide-item">
                                 <a href="/movies/{{$dis_title->id}}">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{$dis_title->long_poster}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6>{{$dis_title->name}}</h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">{{$dis_title->age}}</div>
                                             <span class="text-white">{{$dis_title->duration}}</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </span>
                                          </div>
                                       </div>
                                    
                                    </div>
                                 </a>
                              </li>
                              
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section id="iq-upcoming-movie">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">
                           From <img src="movie/images/20thcenturystudios.png" height="95">
                        </h4>
                     </div>
                     <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                           @foreach($tcs_titles as $dis_title)
                              <li class="slide-item">
                                 <a href="/movies/{{$dis_title->id}}">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{$dis_title->long_poster}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6>{{$dis_title->name}}</h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">{{$dis_title->age}}</div>
                                             <span class="text-white">{{$dis_title->duration}}</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </span>
                                          </div>
                                       </div>
                                    
                                    </div>
                                 </a>
                              </li>
                              
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section id="iq-upcoming-movie">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">
                           From <img src="movie/images/marvel.png" height="95">
                        </h4>
                     </div>
                     <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                           @foreach($marvel_titles as $dis_title)
                              <li class="slide-item">
                                 <a href="/movies/{{$dis_title->id}}">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{$dis_title->long_poster}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6>{{$dis_title->name}}</h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">{{$dis_title->age}}</div>
                                             <span class="text-white">{{$dis_title->duration}}</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </span>
                                          </div>
                                       </div>
                                    
                                    </div>
                                 </a>
                              </li>
                              
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section id="iq-upcoming-movie">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">
                           From <img src="movie/images/svf.png" height="95">
                        </h4>
                     </div>
                     <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                           @foreach($svf_titles as $dis_title)
                              <li class="slide-item">
                                 <a href="/movies/{{$dis_title->id}}">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{$dis_title->long_poster}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6>{{$dis_title->name}}</h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">{{$dis_title->age}}</div>
                                             <span class="text-white">{{$dis_title->duration}}</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </span>
                                          </div>
                                       </div>
                                    
                                    </div>
                                 </a>
                              </li>
                              
                           @endforeach
                        </ul>
                     </div>
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
               <p class="mb-0 text-center font-size-14 text-body"></p>
            </div>
         </div>
      </footer> -->
      <!-- MainContent End-->
      <!-- back-to-top -->
      <div id="back-to-top">
         <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
      </div>
      
      <!-- back-to-top End -->
      <!-- jQuery, Popper JS -->
      <script src="movie/js/jquery-3.4.1.min.js"></script>
      <script src="movie/js/popper.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="movie/js/bootstrap.min.js"></script>
      <!-- Slick JS -->
      <script src="movie/js/slick.min.js"></script>
      <!-- owl carousel Js -->
      <script src="movie/js/owl.carousel.min.js"></script>
      <!-- select2 Js -->
      <script src="movie/js/select2.min.js"></script>
      <!-- Magnific Popup-->
      <script src="movie/js/jquery.magnific-popup.min.js"></script>
      <!-- Slick Animation-->
      <script src="movie/js/slick-animation.min.js"></script>
      <!-- Custom JS-->
      <script src="movie/js/custom.js"></script>
   </body>
</html>