<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dental Cloud</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('auth/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('auth/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('auth/images/img-01.jpg')}}');">
			<div class="wrap-login100 p-t-190 p-b-30">
                <form class="login100-form validate-form" method="post" action="{{route('login')}}">
                @csrf
					<div class="login100-form-avatar">
						<img src="{{asset('auth/images/avatar-01.jpg')}}" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Dental Cloud
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Kullanıcı Adı gereklidir">
						<input class="input100" type="text" name="email" placeholder="Kullanıcı adı">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Şifre alanı Gereklidir">
						<input class="input100" type="password" name="password" placeholder="Şifre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit" >
							Giriş
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
							Şifre Hatırlatma
						</a>
					</div>


				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('auth/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/js/main.js')}}"></script>

</body>
</html>
