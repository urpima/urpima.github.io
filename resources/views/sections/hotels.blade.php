
<!-- Vendor CSS Files -->
<link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets2/vendor/venobox/venobox.css" rel="stylesheet">
<link href="assets2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="assets2/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="assets2/vendor/aos/aos.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets2/css/style.css" rel="stylesheet">


  <!-- ======= Gallery Section ======= -->
  <section id="gallery">
    
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Gallery</h2>
        <p>Check our gallery from the recent events</p>
      </div>
    </div>
    
    <div class="owl-carousel gallery-carousel" data-aos="fade-up" data-aos-delay="100">
      @foreach($hotels as $hotel)
      <a href="{{ URL::to('/') }}/upload/{{ $hotel->photo }}" class="venobox" data-gall="gallery-carousel"><img src="{{ URL::to('/') }}/upload/{{ $hotel->photo }}" alt=""></a>
     
      @endforeach
  </div>
  
  
  </section><!-- End Gallery Section -->


<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- Vendor JS Files -->
<script src="assets2/vendor/jquery/jquery.min.js"></script>
<script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets2/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets2/vendor/php-email-form/validate.js"></script>
<script src="assets2/vendor/venobox/venobox.min.js"></script>
<script src="assets2/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets2/vendor/superfish/superfish.min.js"></script>
<script src="assets2/vendor/hoverIntent/hoverIntent.js"></script>
<script src="assets2/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets2/js/main.js"></script>
<!-- End Gallery Section -->
