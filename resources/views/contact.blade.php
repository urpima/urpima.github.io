@extends('layouts.masterapp')
@section('title','contact')
@section('content')
  <!-- Start  contact -->
  <head>
	<title>soengsouy.com</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link href='https://www.soengsouy.com/favicon.ico' rel='icon' type='image/x-icon'/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formcontact/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formcontact/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formcontact/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vvendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formcontact/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formcontact/css/util.css">
	<link rel="stylesheet" type="text/css" href="formcontact/css/main.css">
	<link rel="stylesheet" href="login-form/css/style.css">

	<!--===============================================================================================-->
</head>
<div id="contact" class="bg-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact100">
			<div class="wrap-contact100">
				<div class="contact100-pic js-tilt" data-tilt>
					<img src="formcontact/images/emailcontact.jpg" alt="IMG">
					<p><span>BP:</span> 6093 – Nouakchott – Mauritanie</p>
                  <p><span>Tel:</span> +222 45 24 19 66 </p>
				</div>
               
        <div >
                <form action="{{route('contact.send')}}" id="contactform" class="contact100-form validate-form" method="post">
                @csrf
                <span class="contact100-form-title">
				Contactez-nous
                    </span>
                    @if(Session::has('message_sent'))
              <div class="alert alert-success" role="alert">
              {{Session::get('message_sent')}}
              </div>
              @endif
                    <div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="name" placeholder="Your Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Your Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Subject is required">
						<input class="input100" type="text" name="subject" placeholder="Subject">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        @error('subject')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Message is required">
						<textarea class="input100" name="message" placeholder="Message"></textarea>
                        <span class="focus-input100"></span>
                        @error('content')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="container-contact100-form-btn">
						<button type="submit" class="contact100-form-btn">
						Envoyer le message
						</button>
					</div>
                 
                    </form>
					</div>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="formcontact/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="formcontact/vendor/bootstrap/js/popper.js"></script>
	<script src="formcontact/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="formcontact/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="formcontact/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="formcontact/js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</html>
  
@endsection