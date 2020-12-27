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
      <link rel="stylesheet" href="../movie/css/bootstrap.min.css" />
      <!-- Typography CSS -->
      <link rel="stylesheet" href="../movie/css/typography.css">
      <!-- Style -->
      <link rel="stylesheet" href="../movie/css/style.css" />
      <!-- Responsive -->
      <link rel="stylesheet" href="../movie/css/responsive.css" />
      
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
                        <a class="navbar-brand" href="/movies"> <img class="img-fluid logo" src="../movie/images/logo.png"
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
      <!-- Slider Start -->
      <!-- Slider End -->
      <!-- MainContent -->
      <div class="main-content">
        
         <section id="iq-upcoming-movie">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">All Movies</h4>
                        
                     </div>
                     <div class="upcoming-contens">
                        <ul class="list-inline row p-0 mb-0">
                           @foreach($titles as $title)
                              <li class="slide-item" style="width: 25%">
                                 <a href="/movies/{{$title->id}}">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{$title->long_poster}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6>{{$title->name}}</h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">{{$title->age}}</div>
                                             <span class="text-white">{{$title->duration}}</span>
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
                           {{-- <li class="slide-item">
                              <a href="movie-details.html">
                                 <div class="block-images position-relative">
                                    <div class="img-box">
                                       <img src="assets/movie/images/posters/001.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                       <h6>Last Night</h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">22+</div>
                                          <span class="text-white">2h 15m</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <span class="btn btn-hover">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="slide-item">
                              <a href="movie-details.html">
                                 <div class="block-images position-relative">
                                    <div class="img-box">
                                       <img src="images/upcoming/03.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                       <h6>1980</h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">25+</div>
                                          <span class="text-white">3h</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <span class="btn btn-hover">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </span>
                                       </div>
                                    </div>
                                    <div class="block-social-info">
                                       <ul class="list-inline p-0 m-0 music-play-lists">
                                          <li><span><i class="ri-volume-mute-fill"></i></span></li>
                                          <li><span><i class="ri-heart-fill"></i></span></li>
                                          <li><span><i class="ri-add-line"></i></span></li>
                                       </ul>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="slide-item">
                              <a href="movie-details.html">
                                 <div class="block-images position-relative">
                                    <div class="img-box">
                                       <img src="images/upcoming/04.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                       <h6>Looters</h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">11+</div>
                                          <span class="text-white">2h 45m</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <span class="btn btn-hover">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </span>
                                       </div>
                                    </div>
                                    <div class="block-social-info">
                                       <ul class="list-inline p-0 m-0 music-play-lists">
                                          <li><span><i class="ri-volume-mute-fill"></i></span></li>
                                          <li><span><i class="ri-heart-fill"></i></span></li>
                                          <li><span><i class="ri-add-line"></i></span></li>
                                       </ul>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="slide-item">
                              <a href="movie-details.html">
                                 <div class="block-images position-relative">
                                    <div class="img-box">
                                       <img src="images/upcoming/05.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                       <h6>Vugotronic</h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">9+</div>
                                          <span class="text-white">2h 30m</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <span class="btn btn-hover">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </span>
                                       </div>
                                    </div>
                                    <div class="block-social-info">
                                       <ul class="list-inline p-0 m-0 music-play-lists">
                                          <li><span><i class="ri-volume-mute-fill"></i></span></li>
                                          <li><span><i class="ri-heart-fill"></i></span></li>
                                          <li><span><i class="ri-add-line"></i></span></li>
                                       </ul>
                                    </div>
                                 </div>
                              </a>
                           </li> --> --}}
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         {{-- <section id="iq-topten">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title topten-title-sm">Top 10 in India</h4>
                     </div>
                     <div class="topten-contens">
                        <h4 class="main-title topten-title">Top 10 in India</h4>
                        <ul id="top-ten-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                           <li>
                              <a href="movie-details.html">
                              <img src="images/top-10/01.jpg" class="img-fluid w-100" alt="">
                              </a>
                           </li>
                           <li>
                              <a href="movie-details.html">
                              <img src="images/top-10/02.jpg" class="img-fluid w-100" alt="">
                              </a>
                           </li>
                           <li>
                              <a href="movie-details.html">
                              <img src="images/top-10/03.jpg" class="img-fluid w-100" alt="">
                              </a>
                           </li>
                           <li>
                              <a href="movie-details.html">
                              <img src="images/top-10/04.jpg" class="img-fluid w-100" alt="">
                              </a>
                           </li>
                           <li>
                              <a href="movie-details.html">
                              <img src="images/top-10/05.jpg" class="img-fluid w-100" alt="">
                              </a>
                           </li>
                           <li>
                              <a href="movie-details.html">
                              <img src="images/top-10/06.jpg" class="img-fluid w-100" alt="">
                              </a>
                           </li>
                        </ul>
                        <div class="vertical_s">
                           <ul id="top-ten-slider-nav" class="list-inline p-0 m-0  d-flex align-items-center">
                              <li>
                                 <div class="block-images position-relative">
                                    <a href="movie-details.html">
                                    <img src="images/top-10/01.jpg" class="img-fluid w-100" alt="">
                                    </a>
                                    <div class="block-description">
                                       <h5>The Illusion</h5>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">10+</div>
                                          <span class="text-white">3h 15m</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="movie-details.html" class="btn btn-hover" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i> Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="block-images position-relative">
                                    <a href="movie-details.html">
                                    <img src="images/top-10/02.jpg" class="img-fluid w-100" alt="">
                                    </a>
                                    <div class="block-description">
                                       <h5>Burning</h5>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">13+</div>
                                          <span class="text-white">2h 20m</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="movie-details.html" class="btn btn-hover" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i> Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="block-images position-relative">
                                    <a href="movie-details.html">
                                    <img src="images/top-10/03.jpg" class="img-fluid w-100" alt="">
                                    </a>
                                    <div class="block-description">
                                       <h5>Hubby Kubby</h5>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">9+</div>
                                          <span class="text-white">2h 40m</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="movie-details.html" class="btn btn-hover" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i> Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="block-images position-relative">
                                    <a href="movie-details.html">
                                    <img src="images/top-10/04.jpg" class="img-fluid w-100" alt="">
                                    </a>
                                    <div class="block-description">
                                       <h5>Open Dead Shot</h5>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">16+</div>
                                          <span class="text-white">1h 40m</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="movie-details.html" class="btn btn-hover" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i> Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="block-images position-relative">
                                    <a href="movie-details.html">
                                    <img src="images/top-10/05.jpg" class="img-fluid w-100" alt="">
                                    </a>
                                    <div class="block-description">
                                       <h5>Jumbo Queen</h5>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">15+</div>
                                          <span class="text-white">3h</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="movie-details.html" class="btn btn-hover" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i> Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="block-images position-relative">
                                    <a href="movie-details.html">
                                    <img src="images/top-10/06.jpg" class="img-fluid w-100" alt="">
                                    </a>
                                    <div class="block-description">
                                       <h5>The Lost Journey</h5>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">20+</div>
                                          <span class="text-white">2h 15m</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="movie-details.html" class="btn btn-hover" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i> Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section> --}}
         <!-- <section id="iq-suggestede" class="s-margin">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">Suggested For You</h4>
                        <a href="show-category.html" class="text-primary">View all</a>
                     </div>
                     <div class="suggestede-contens">
                        <ul class="list-inline favorites-slider row p-0 mb-0">
                           <li class="slide-item">
                              <a href="movie-details.html">
                                 <div class="block-images position-relative">
                                    <div class="img-box">
                                       <img src="images/suggested/01.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                       <h6>Blood Block</h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">11+</div>
                                          <span class="text-white">2h 30m</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now</span>
                                       </div>
                                    </div>
                                    <div class="block-social-info">
                                       <ul class="list-inline p-0 m-0 music-play-lists">
                                          <li><span><i class="ri-volume-mute-fill"></i></span></li>
                                          <li><span><i class="ri-heart-fill"></i></span></li>
                                          <li><span><i class="ri-add-line"></i></span></li>
                                       </ul>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="slide-item">
                              <a href="show-details.html">
                                 <div class="block-images position-relative">
                                    <div class="img-box">
                                       <img src="images/suggested/02.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                       <h6>Mission Moon</h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">9+</div>
                                          <span class="text-white">2 Seasons</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now</span>
                                       </div>
                                    </div>
                                    <div class="block-social-info">
                                       <ul class="list-inline p-0 m-0 music-play-lists">
                                          <li><span><i class="ri-volume-mute-fill"></i></span></li>
                                          <li><span><i class="ri-heart-fill"></i></span></li>
                                          <li><span><i class="ri-add-line"></i></span></li>
                                       </ul>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="slide-item">
                              <a href="movie-details.html">
                                 <div class="block-images position-relative">
                                    <div class="img-box">
                                       <img src="images/suggested/03.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                       <h6>Unknown Land</h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">17+</div>
                                          <span class="text-white">2h 30m</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now</span>
                                       </div>
                                    </div>
                                    <div class="block-social-info">
                                       <ul class="list-inline p-0 m-0 music-play-lists">
                                          <li><span><i class="ri-volume-mute-fill"></i></span></li>
                                          <li><span><i class="ri-heart-fill"></i></span></li>
                                          <li><span><i class="ri-add-line"></i></span></li>
                                       </ul>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="slide-item">
                              <a href="show-details.html">
                                 <div class="block-images position-relative">
                                    <div class="img-box">
                                       <img src="images/suggested/04.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                       <h6>Friends</h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">19+</div>
                                          <span class="text-white">3 Seasons</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now</span>
                                       </div>
                                    </div>
                                    <div class="block-social-info">
                                       <ul class="list-inline p-0 m-0 music-play-lists">
                                          <li><span><i class="ri-volume-mute-fill"></i></span></li>
                                          <li><span><i class="ri-heart-fill"></i></span></li>
                                          <li><span><i class="ri-add-line"></i></span></li>
                                       </ul>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="slide-item">
                              <a href="movie-details.html">
                                 <div class="block-images position-relative">
                                    <div class="img-box">
                                       <img src="images/suggested/05.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                       <h6>Inside the Sea</h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">13+</div>
                                          <span class="text-white">2h 40m</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now</span>
                                       </div>
                                    </div>
                                    <div class="block-social-info">
                                       <ul class="list-inline p-0 m-0 music-play-lists">
                                          <li><span><i class="ri-volume-mute-fill"></i></span></li>
                                          <li><span><i class="ri-heart-fill"></i></span></li>
                                          <li><span><i class="ri-add-line"></i></span></li>
                                       </ul>
                                    </div>
                                 </div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section> -->
         
        
         
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
</html>