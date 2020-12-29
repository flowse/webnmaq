<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
	<meta charset="utf-8">
	<meta name="author" content="مؤسسة نمق السعودية">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="موقع نمق هو موقع لادارة المحتوى العربي في المملكة العربية السعودية">
	

        <meta name="keywords" content="نمق,تأليف المحتوى,نص, المحتوى العربي, صناعة محتوى, المحتوى التسويقي, المحتوى التعريفي, كتابة محتوى, وصف المنتجات">
	<meta name="google-site-verification" content="eCUC-skY-Y1pkLa4ygwbU_F-v0ap2GRLDxTfarwwwbM"/>
	<link rel="shortcut icon" href="images/favicon.ico">

	<title>نمق </title>
	<link rel="stylesheet" href="assets/css/vendor.bundle.css?ver=142">
	<link rel="stylesheet" href="assets/css/style.css?ver=142">
	<link rel="stylesheet" href="assets/css/theme-method.css?ver=142">
	<link rel="stylesheet" href="assets/css/rtl.css?ver=142">
					
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172360510-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-172360510-1');
    </script>

</head>

<body class="theme-method io-method is-rtl" dir="rtl" data-spy="scroll" data-target="#mainnav" data-offset="80">

	<!-- Header --> 
	<header class="site-header is-sticky has-fixed">
		<!-- Navbar -->
		<div class="navbar navbar-expand-lg is-transparent blog-navbar"  id="mainnav">
			<nav class="container">

				<a class="navbar-brand animated" data-animate="fadeInDown" data-delay=".65" href="/blog">
					<!-- <img class="logo logo-dark" alt="logo" src="images/logo.png"> -->
					<img class="logo " alt="logo" src="images/logo-full-white.png">
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
						@if (\Auth::user()->role == 'admin')
						<li class="nav-item"><a class="nav-link menu-link" href="/dashboard">صفحة التحكم</a></li>
						@else
						<li class="nav-item">
						<a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
							تسجيل الخروج
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
						</li>
						@endif
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
		<!-- End Navbar -->

		
<!--section blog-->
<div class="section media-scetion pb section-pad section-bg-alt mt-5" id="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-head-s6">
					<h3 class="heading-sm-s2">المدونة</h3>
				</div>
				<div class="gaps size-1x d-none d-md-block"></div>
			</div>
		</div>
		
				<div class="row justify-content-center">
				
				@yield('blog_cards')
					
				</div>
			
			
		</div>
		
</div>
<!--end section blog-->



		<!-- Start Section -->
		<div class="section footer-scetion footer-jasmine section-bg-white">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-12">
						<ul>
							<li><a href="" class="footer-logo"><img src="images/logo-full-white.png" alt="logo2x"></a></li>
							<li><a style="font-size: x-large;" href="https://twitter.com/Nmaq_sa"> <span class="fab fa-twitter"></span> </a></li>
</ul>
						<span class="copyright-text">
							جميع الحقوق محفوظه @ 2019 نمق
							<span>All trademarks and copyrights belong to their respective owners.</span>
						</span>
					</div>
				</div>
			</div>
		</div>
		<!-- End Section -->
		

	<div id="preloader">
		<div id="loader"></div>
		<div class="loader-section loader-top"></div>
   		<div class="loader-section loader-bottom"></div>
	</div>

<script src="assets/js/jquery.bundle.js?ver=142"></script>
<script src="assets/js/script.js?ver=142"></script>

</body>
</html>
