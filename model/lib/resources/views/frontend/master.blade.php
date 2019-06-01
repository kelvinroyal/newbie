<!DOCTYPE html>
<html>
<head>
    <base href="{{asset('public/frontend')}}/">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>@yield('title') - Paradise of Sweet Girl</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/sg.jpg">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <link rel="manifest" href="/manifest.json" />
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
      var OneSignal = window.OneSignal || [];
      OneSignal.push(function() {
        OneSignal.init({
          appId: "dfdfcf0e-d93b-4101-9906-5e13636e41c9",
        });
      });
    </script>

    <meta name="trafficjunky-site-verification" content="r48swnvq8" />
    
</head>

<body class="bg-pattern">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v3.2'
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your customer chat code -->
<div class="fb-customerchat"
    attribution=setup_tool
    page_id="1472682579457604"
    theme_color="#ff5ca1"
    logged_in_greeting="Hi! If you help any girl, contact me"
    logged_out_greeting="Hi! If you help any girl, contact me">
</div>

    <!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>

    <!-- ****** Top Header Area Start ****** -->
    <div class="top_header_area">
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-6">
                    <!--  Top Social bar start -->
                    <div class="top_social_bar">
                        <a href="https://www.facebook.com/sgirl.page/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/sweetgirl12369/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!--  Login Register Area -->
                <div class="col-7 col-sm-6">
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        @if(isset(Auth::user()->name_user))
                        <div class="login_register_area d-flex">
                            Hello,&nbsp<span style="color: red">{{Auth::user()->name_user}}</span>&nbsp
                            <a href="{{asset('logout2')}}" class="btn btn-warning btn-flat">Sign out</a>
                        </div>
                        @else
                        <div class="login_register_area d-flex">
                            <div class="login">
                                <a href="#" data-toggle="modal" data-target="#myModal">Sign in</a>
                            </div>
                            <div class="register">
                                <a href="#" data-toggle="modal" data-target="#myModal2">Sign up</a>
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <form action="{{asset('signin')}}" method="post">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Sign In</h4>
                              </div>
                              <div class="modal-body">
                                  <label>Email:</label>
                                  <input type="email" required="" class="form-control" name="email" placeholder="Email..." value="{{old('email')}}">
                                  <label>Password</label>
                                  <input type="password" required="" class="form-control" name="password" placeholder="Password...">
                                  <label>
                                      <input type="checkbox" name="remember" value="Remember me"> Remember me
                                  </label>
                              </div>
                              <div class="modal-footer">
                                  <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              </div>
                          </div>
                      </div>
                      {{csrf_field()}}
                  </form>
              </div>
              <!-- Modal 2-->
              <div class="modal fade" id="myModal2" role="dialog">
                <form action="{{asset('signup')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Sign Up</h4>
                      </div>
                      <div class="modal-body">
                          <label>Email:</label>
                          <input type="email" class="form-control" name="email" placeholder="Email..." required="">
                          <label>Password:</label>
                          <input type="password" class="form-control" name="password" placeholder="Password..." required="">
                          <label>Name:</label>
                          <input type="text" class="form-control" name="name_user" placeholder="Name..." required="">
                          <label>Avatar:</label>
                          <input type="file" name="avatar" onchange="changeImg(this)" required="">
                          <div class="g-recaptcha" data-sitekey="6Lc15HoUAAAAAA1Pnnl3V4YNLPTmEt4b_pH5w3q5"></div>
                      </div>
                      <div class="modal-footer">
                          <input type="submit" class="btn btn-primary" name="submit2" value="Submit">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                  </div>
              </div>
              {{csrf_field()}}
          </form>
      </div>

      <div class="signup-search-area d-flex align-items-center justify-content-end">
        <!-- Search Button Area -->
        <div class="search_button">
            <a class="searchBtn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
        <!-- Search Form -->
        <div class="search-hidden-form">
            <form action="{{asset('search2/')}}" method="get">
                <input type="search" name="result" id="search-anything" placeholder="Search Anything...">
                <input type="submit" value="" class="d-none">
                <span class="searchBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- ****** Top Header Area End ****** -->

<!-- ****** Header Area Start ****** -->
<header class="header_area">
    <div class="container">
        <div class="row">
            <!-- Logo Area Start -->
            <div class="col-12">
                <div class="logo_area text-center">
                    <a href="{{asset('/')}}" class="yummy-logo">Sweet Girl</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                    <!-- Menu Area Start -->
                    <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                        <ul class="navbar-nav" id="yummy-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{asset('/')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="yummyDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                                <div class="dropdown-menu" aria-labelledby="yummyDropdown">
                                    <a class="dropdown-item" href="{{asset('hot')}}">Hot</a>
                                    <a class="dropdown-item" href="{{asset('update')}}">Update</a>
                                </div>
                            </li>
                            @foreach($cont as $c)
                            <li class="nav-item">
                                <a class="nav-link" href="{{asset('continent/'.$c->id_continents.'/'.strtolower($c->name_continents)).'.html'}}">{{$c->name_continents}}</a>
                            </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="nav-link" href="{{asset('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ****** Header Area End ****** -->

<!-- Master page -->

@yield('main')

<!-- Master page end -->
<div class="container">
    <div class="row banner">
        @foreach($banner as $b)
        @if($b->id_banner==1)
        <div style="margin: 0 auto;"><a href="{{$b->link_banner}}"> {!!$b->content_banner!!}</a></div>
        @endif
        @endforeach
    </div>
</div>
<!-- ****** Instagram Area Start ****** -->
<div class="instargram_area owl-carousel section_padding_100_0 clearfix" id="portfolio">

    <!-- Instagram Item -->
    @foreach($slide2 as $s)
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="{{asset('lib/storage/app/slide2-img/'.$s->photo_slide2)}}" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="{{$s->link_slide2}}"><i class="fa fa-female" aria-hidden="true"></i> Follow her</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- ****** Our Creative Portfolio Area End ****** -->

<!-- ****** Footer Social Icon Area Start ****** -->
<div class="social_icon_area clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-social-area d-flex">
                    <div class="single-icon">
                        <a href="https://www.facebook.com/sgirl.page/"><i class="fa fa-facebook" aria-hidden="true"></i><span>facebook</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span>GOOGLE+</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i><span>linkedin</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="https://www.instagram.com/sweetgirl12369/"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i><span>VIMEO</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i><span>YOUTUBE</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ****** Footer Social Icon Area End ****** -->

<!-- ****** Footer Menu Area Start ****** -->
<footer class="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-content">
                    <!-- Logo Area Start -->
                    <div class="footer-logo-area text-center">
                        <a href="{{asset('/')}}" class="yummy-logo">Sweet Girl</a>
                    </div>
                    <!-- Menu Area Start -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-footer-nav" aria-controls="yummyfood-footer-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="yummyfood-footer-nav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{asset('/')}}">Home <span class="sr-only">(current)</span></a>
                                </li>
                                @foreach($cont as $c)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('continent/'.$c->id_continents.'/'.str_slug($c->name_continents)).'.html'}}">{{$c->name_continents}}</a>
                                </li>
                                @endforeach
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('contact')}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Copywrite Text -->
                <div class="copy_right_text text-center">
                    <p>Copyright @2019 Sweet Girl | Paradise of Sweet Girl <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Unknown team</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- ****** Footer Menu Area End ****** -->

<!-- Jquery-2.2.4 js -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/bootstrap/popper.min.js"></script>
<!-- Bootstrap-4 js -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins JS -->
<script src="js/others/plugins.js"></script>
<!-- Active JS -->
<script src="js/active.js"></script>

<script type="text/javascript" src="js/infinite-scroll.pkgd.min.js"></script>
@yield('script')
</body>
</html>