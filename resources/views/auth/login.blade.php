<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf" content="{{ csrf_token() }}">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{url('/')}}/assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf
					<span class="login100-form-title p-b-26">
						Masuk
					</span>
					<div class="nip_validation" style="display:none">
						<div class="alert alert-danger" style="padding-bottom: 10px;">
							<strong>NIP</strong> <span id="error_v"></span>
						</div>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input id="nip" class="input100" type="text" name="nip" value="{{ old('nip') }}" required autofocus>
						<span class="focus-input100" data-placeholder="NIP"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input id="password" type="password" class="input100" name="password" required>
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-50">

					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="{{url('/')}}/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/assets/vendor/bootstrap/js/popper.js"></script>
	<script src="{{url('/')}}/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{url('/')}}/assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/assets/js/main.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#nip').on('blur', function(event){
			event.preventDefault();
			var nip = $(this).val();
			$.ajax({
				url: "{{ route('nip.validation') }}",
				method: "POST",
				headers: {
					"X-CSRF-TOKEN": $("meta[name=csrf]").attr('content')
				},
				data: { nip: nip },
				success: function(data){
					if (data) {
						$('.login100-form-btn').prop('disabled', true);
						$('#error_v').text(data);
						$('.nip_validation').show();
					}else {
						$('.login100-form-btn').prop('disabled', false);
						$('.nip_validation').hide();
					}
				}
			});
		});
	});
	</script>

</body>
</html>
