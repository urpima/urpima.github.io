
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>{{ env('APP_NAME', 'TheEvent') }}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('lib/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

<main id="main" class="main-page">
  <section id="speakers-details" class="wow fadeIn">
    <div class="container">
      <div class="section-header">
        <h2>Speaker Details</h2>
        <p>Praesentium ut qui possimus sapiente nulla.</p>
      </div>

      <div class="row">
        <div class="col-md-6">
          <img src="{{ URL::to('/') }}/upload/{{ $speaker->photo }}" alt="{{ $speaker->name }}" class="img-fluid">
        </div>

        <div class="col-md-6">
          <div class="details">
            <h2>{{ $speaker->name }}</h2>
            <div class="social">
              <a href="{{ $speaker->twitter }}"><i class="fa fa-twitter"></i></a>
              <a href="{{ $speaker->facebook }}"><i class="fa fa-facebook"></i></a>
              <a href="{{ $speaker->linkedin }}"><i class="fa fa-linkedin"></i></a>
            </div>
            <p>{{ $speaker->full_description }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>