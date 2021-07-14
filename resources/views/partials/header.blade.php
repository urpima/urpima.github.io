<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

@if(app()->getLocale() == 'en')
<link rel="stylesheet" href="{{ asset('css/ltr-app.css')}}">
@else
<link rel="stylesheet" href="{{ asset('css/rtl-app.css')}}">
@endif
<!-- ======= Slider Section ======= -->
<div id="home" class="slider-area">
<div class="bend niceties preview-2">
  <div id="ensign-nivoslider" class="slides">
    <img src="{{ asset('assets/img/slider/slider1.jpg')}}" alt="" title="#slider-direction-1" />
    <img src="{{ asset('assets/img/slider/slider2.jpg')}}" alt="" title="#slider-direction-2" />
    <img src="{{ asset('assets/img/slider/slider3.jpg')}}" alt="" title="#slider-direction-3" />
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
 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
  <div class="container d-flex">

    <div class="logo mr-auto">
      <h1 class="text-light"><a href="/"><img  src="{{ asset('images/LOBE.png')}}" alt="" ></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>
@if( app()->isLocale('ar'))
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li  class="drop-down"><a href="#"><span>{{app()->getLocale() }}</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
          @foreach (language()->allowed() as $code => $name)
          <li align="left">
     <a href="{{ language()->back($code) }}">{{ $name }}</a>
     </li>
     @endforeach
                               </ul>
                               
             </li>
        <li><a href="{{ route('login') }}"> {{__('translate.signin')}}</a></li>
        <li><a href="/contact">{{__('translate.contact')}}</a></li>
        <li><a href="/gallery">{{__('translate.galleries')}}</a></li>
        <li><a href="#blog">{{__('translate.PROJECTS')}}</a></li>
        <li><a href="/Activite">{{__('translate.activities')}}</a></li>
        <li><a href="/semin">{{__('translate.seminar')}}</a></li>
        <li><a href="/publication">{{__('translate.publication')}}</a></li>
        <li><a href="/Team">{{__('translate.teams')}}</a></li>
        <li class="active"><a href="/">{{__('translate.home')}}</a></li>
        
      </ul>
    </nav>
    @else
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="#header">{{__('translate.home')}}</a></li>
        <li><a href="/Team">{{__('translate.teams')}}</a></li>
        <li><a href="/publication">{{__('translate.publication')}}</a></li>
        <li><a href="/semin">{{__('translate.seminar')}}</a></li>
        <li><a href="/Activite">{{__('translate.activities')}}</a></li>
        <li><a href="#blog">{{__('translate.PROJECTS')}}</a></li>
        <li><a href="/gallery">{{__('translate.galleries')}}</a></li>
        
        <li><a href="/contact">{{__('translate.contact')}}</a></li>
        <li><a href="{{ route('login') }}"> {{__('translate.signin')}}</a></li>
        <li  class="drop-down"><a href="#"><span>{{app()->getLocale() }}</span> <i class="bi bi-chevron-down"></i></a>
       <ul>
       @foreach (language()->allowed() as $code => $name)
       <li align="left">
  <a href="{{ language()->back($code) }}">{{ $name }}</a>
  </li>
  @endforeach
                            </ul>
                            
          </li>
      </ul>
    </nav>
    @endif
    <!-- .nav-menu -->

  </div>
</header><!-- End Header -->




</main><!-- End #main -->
