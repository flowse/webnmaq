<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'نمق') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
       <!--  <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.css?ver=142') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css?ver=142') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/theme-method.css?ver=142') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/rtl.css?ver=142') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    </head>
    <body class="bg-light theme-method io-method is-rtl" dir="rtl" data-spy="scroll" data-target="#mainnav" data-offset="80">
    <header class="site-header is-sticky has-fixed">
    <div class="navbar navbar-expand-lg is-transparent blog-navbar"  id="mainnav">
			<nav class="container">

				<a class="navbar-brand animated" data-animate="fadeInDown" data-delay=".65" href="/blog">
					<!-- <img class="logo logo-dark" alt="logo" src="images/logo.png"> -->
					<img class="logo " alt="logo" src="{{ asset('images/logo-full-white.png') }}">
				</a>
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle">
					<span class="navbar-toggler-icon">
						<span class="ti ti-align-justify"></span>
					</span>
				</button>

				<div class="collapse navbar-collapse justify-content-end" id="navbarToggle">
					<ul class="navbar-nav animated remove-animation" data-animate="fadeInDown" data-delay=".75">
						<li class="nav-item"><a class="nav-link menu-link" href="/index#intro">الرؤية والرسالة</a></li>
						<li class="nav-item"><a class="nav-link menu-link" href="/index#services">خدماتنا</a></li>
						
						<li class="nav-item"><a class="nav-link menu-link" href="/index#packages"> باقاتنا</a></li>
						<li class="nav-item"><a class="nav-link menu-link" href="/index#partner">شركاء نمق</a></li>
						<li class="nav-item"><a class="nav-link menu-link" href="/blog">المدونة</a></li>
						@auth
						<a class="nav-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
							تسجيل الخروج
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
						@else
						<!-- <li class="nav-item">
							<a href="{{route('login')}}" class="nav-link">تسجيل الدخول</a>
						</li> -->
						<li class="nav-item">
							<a href="{{route('register')}}" class="nav-link">التسجيل</a>
						</li>
						@endauth
					</ul>
					<ul> 
						<li> <a style="font-size: x-large;" href="https://twitter.com/Nmaq_sa">  <span class="fab fa-twitter" style="color:white;"></span>  </a></li>
					</ul>
				</div>
			</nav>
        </div>
        </header>
        <!-- End Navbar -->
        
        {{ $slot }}

        <div id="preloader">
		<div id="loader"></div>
		<div class="loader-section loader-top"></div>
   		<div class="loader-section loader-bottom"></div>
	</div>

<script src="assets/js/jquery.bundle.js?ver=142"></script>
<script src="assets/js/script.js?ver=142"></script>

    </body>
</html>