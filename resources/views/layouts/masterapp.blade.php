<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ (app()->isLocale('ar') ? 'rtl' : 'ltr') }}" class="ltr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eBusiness - v2.2.1
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<style>
  /* rtl:begin:options: {
  "autoRename": true,
  "stringMap":[
    "name": "ltr-rtl",
    "priority": 100,
    "search": ["ltr"],
    "replace": ["rtl"],
    "options": {
      "scope": "*",
      "ignoreCase": false
    }
  ]
} */
.ltr {
    @import "~bootstrap/scss/bootstrap";
}
/*rtl:end:options*/
@import "~bootstrap/scss/functions";
@import "~bootstrap/scss/variables";
@import "~bootstrap/scss/mixins";

    a:hover,
a:active,
a:focus {
  color: #3ec1d5;
  outline: none;
  text-decoration: none;
}
.bg-light {
    background-color: transparent!important;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    /* background-color: #007bff; */
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    /*color: rgb(102, 97, 97);
    background-color: #007bff;*/
}

/*body {
  direction: rtl;
}*/
    </style>

    @if(app()->getLocale() == 'en')
    <link rel="stylesheet" href="css/ltr-app.css">
    @else
    <link rel="stylesheet" href="css/rtl-app.css">
@endif
   <!-- ======= Slider Section ======= -->
   <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="assets/img/slider/slider1.jpg" alt="" title="#slider-direction-1" />
        <img src="assets/img/slider/slider2.jpg" alt="" title="#slider-direction-2" />
        <img src="assets/img/slider/slider3.jpg" alt="" title="#slider-direction-3" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow animate__slideInDown animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">The Best Business Information </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h1 class="title2">We're In The Business Of Helping You Start Your Business</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">The Best Business Information </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">We're In The Business Of Get Quality Business Service</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">The Best business Information </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Helping Business Security & Peace of Mind for Your Family</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Slider -->
</head>
<body data-spy="scroll" data-target="#navbar-example">
  
@yield('content')
 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
 <div class="logo mr-auto">
        <h1 class="text-light"><a href="home"> <img align="left" src="images/LOBE.png" alt="" width="130px" heigth="130px"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
 
    
    </div>
        
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
     
     
      <nav class="nav-menu d-none d-lg-block navbar navbar-expand-lg navbar-light bg-light">
       <!-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active"  data-toggle="pill1" href="/" role="tab" aria-controls="pills-home" aria-selected="true">{{__('translate.home')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  data-toggle="pill2" href="/Services" role="tab" aria-controls="pills-profile" aria-selected="false">{{__('translate.teams')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  data-toggle="pill3" href="/semin" role="tab" aria-controls="pills-contact" aria-selected="false">{{__('translate.seminar')}}</a>
          </li>
        </ul>-->
        
        
        <ul>
         <li class="menu-active "> <a  class="nav-link active" aria-selected="true" href="/">{{__('translate.home')}}</a></li>
          <li><a class=" nav-link " aria-selected="false" href="/Services">{{__('translate.teams')}}</a></li>
          <li><a class=" nav-link " aria-selected="false" href="/publication">{{__('translate.publication')}}</a></li> 
          <li><a class=" nav-link " aria-selected="false" href="/semin">{{__('translate.seminar')}}</a></li>  
          <li><a class=" nav-link " aria-selected="false" href="/Services">{{__('translate.activities')}}</a></li>
          <li><a class=" nav-link " aria-selected="false" href="/Team">{{__('translate.PROJECTS')}}</a></li>
          <li><a class=" nav-link " aria-selected="false" href="/Team">{{__('translate.galleries')}}  </a></li>
          <li>
   <form action="{{ route('search') }}" method="GET">
					    @csrf
					    <input type="text" name="query" class="form-control" />
					    <input type="submit" class="btn btn-sm btn-primary" value="Search" style="margin-top: 10px;" />
					</form>
               
</li>
          <li><a class="nav-link scrollto" href="/contact">{{__('translate.contact')}}</a></li>
          <li><a href="{{ route('login') }}"> {{__('translate.signin')}}</a></li>
          <li  class="drop-down"><a href="#"><span>{{app()->getLocale() }}</span> <i class="bi bi-chevron-down"></i></a>
         <ul>

          
         
         @foreach (language()->allowed() as $code => $name)
         <li align="left">
    <a href="{{ language()->back($code) }}">{{ $name }}</a></li>
@endforeach
                              </ul>
                              
            </li>
        </ul>
      </nav><!-- .nav-menu -->
      
    </div>
  </header><!-- End Header -->
  
  

 
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo Poryt">
                  <h2> <img src="images/LOGOFc.png" alt=""></h2>
                </div>

                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <h4>{{__('translate.contactus')}}</h4>
                <div class="footer-contacts">
                  <p><span>BP:</span> 6093 – Nouakchott – Mauritanie</p>
                  <p><span>Tel:</span> +222 45 24 19 66 </p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
             
                  <h4>{{__('translate.OURPARTNERS')}} </h4>
                <div class="flicker-img">
                  <a href="#"><img src="assets/img/portfolio/iscae.JPG" alt=""></a>
                  <a href="#"><img src="assets/img/portfolio/logo.svg" alt=""></a>
                  <a href="#"><img src="assets/img/portfolio/U.N.A.jpg" alt=""></a>
                  <a href="#"><img src="assets/img/portfolio/4.jpg" alt=""></a>
                  <a href="#"><img src="assets/img/portfolio/5.jpg" alt=""></a>
                  <a href="#"><img src="assets/img/portfolio/6.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>eBusiness</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
            -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/appear/jquery.appear.js"></script>
  <script src="assets/vendor/knob/jquery.knob.js"></script>
  <script src="assets/vendor/parallax/parallax.js"></script>
  <script src="assets/vendor/wow/wow.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  </body>