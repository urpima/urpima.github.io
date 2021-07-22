@extends('layouts.masterapp')
@section('title','reset password')
@section('content')
<html lang="en">
<head>
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
	<link rel="stylesheet" type="text/css" href="formcontact/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formcontact/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formcontact/css/util.css">
	<link rel="stylesheet" type="text/css" href="formcontact/css/main.css">
	<!--===============================================================================================-->

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="login-form/css/style.css">

	</head>

    <body >
	<main id="main">
	<div class="bg-contact100" >
		<div class="container-contact100">
			<div class="wrap-contact100">
			<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
			<div>
                    <form class="contact100-form validate-form" method="post" action="{{ route('login') }}">
                    @csrf
					<span class="contact100-form-title">
					{{__('translate.login')}}
                    </span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input type="email" class="input100" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="{{__('translate.E-MailAddress')}}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						@error('email')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                    </div>
					<div class="wrap-input100 validate-input" data-validate = "Subject is required">
						<input type="password" class="input100" name="password" required autocomplete="current-password"
                                                id="exampleInputPassword" placeholder="{{__('translate.password')}}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-key" aria-hidden="true"></i>
                        </span>
						@error('password')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    
                        </div>                
                <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary"> 
									  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									  <span class="checkmark">{{ __('translate.RememberMe') }}</span>
									</label>
								</div>
								<div class="w-50 text-md-right">
                                @if (Route::has('password.request'))
									<a class="btn btn-link" href="{{ route('password.request') }}" style="color: #3ec1d5"> {{__('translate.ForgotPassword')}}</a>
                                    @endif
                                </div>
	            </div>
				<div class="container-contact100-form-btn">
						<button type="submit" class="contact100-form-btn">
						{{__('translate.login')}}
						</button>
					</div>
               
                    </form>
			</div>
		</div>
	</div>
	<div>



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
</main>
</body>
</html>
  
@endsection