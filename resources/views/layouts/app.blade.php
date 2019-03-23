<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>HolaHalo Catalog | {{$page['pageTitle']}}</title>
		<meta charset="UTF-8">
		<meta name="description" content=" Divisima | eCommerce Template">
		<meta name="keywords" content="divisima, eCommerce, creative, html">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Favicon -->
		<link href="{{{ URL::asset('img/icon.ico')}}}" rel="shortcut icon"/>

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="{{{ URL::asset('css/bootstrap.min.css')}}}"/>
		<link rel="stylesheet" href="{{{ URL::asset('css/font-awesome.min.css')}}}"/>
		<link rel="stylesheet" href="{{{ URL::asset('css/flaticon.css')}}}"/>
		<link rel="stylesheet" href="{{{ URL::asset('css/slicknav.min.css')}}}"/>
		<link rel="stylesheet" href="{{{ URL::asset('css/jquery-ui.min.css')}}}"/>
		<link rel="stylesheet" href="{{{ URL::asset('css/owl.carousel.min.css')}}}"/>
		<link rel="stylesheet" href="{{{ URL::asset('css/animate.css')}}}"/>
		<link rel="stylesheet" href="{{{ URL::asset('css/style.css')}}}"/>
        @yield('stylesheets')
	</head>
	<body>
		<!-- Page Preloder -->
		<div id="preloder">
			<div class="loader"></div>
		</div>

		<!-- Header section -->
		<header class="header-section">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 text-center text-lg-left">
							<!-- logo -->
							<a href="{{route('index')}}" class="site-logo">
								<img src="{{{ URL::asset('img/hola-halo.png')}}}" alt="">
							</a>
						</div>
						@if(Auth::guard('admin')->check())
						<div class="col-lg-10 text-lg-right">
							<div class="user-panel">
								<div class="up-item">
									<i class="flaticon-profile"></i>
									<a href="#"
									 onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
									 Logout
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
									</form>
								</div>
							</div>
						</div>
						@else
						<div class="col-lg-10 text-lg-right">
							<div class="user-panel">
								<div class="up-item">
									<i class="flaticon-profile"></i>
									<a href="{{ route('loginForm') }}">Login {{Auth::guard('admin')->check()}}</a>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
			<nav class="main-navbar">
				<div class="container">
					<!-- menu -->
					<ul class="main-menu">
						<li><a href="{{route('index')}}">Home</a></li>
                        <li><a href="{{route('product.all')}}">Lihat Semua Produk</a></li>
						@if(Auth::guard('admin')->check())
						<li><a href="#">Kelola Katalog</a>
							<ul class="sub-menu">
                                <li><a href="{{route('category.index')}}">Kategori</a></li>
								<li><a href="{{route('product.index')}}">Produk</a></li>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</nav>
		</header>
        <!-- Header section end -->
        
        @yield('content')
        
        <!-- Footer section -->
        <section class="footer-section"> 
            <div class="social-links-warp">
                <div class="container">
                    <div class="social-links">
                        <a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
                        <a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
                        <a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
                        <a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
                        <a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
                        <a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
                        <a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
                    </div>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
                    <p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </section>
        <!-- Footer section end -->
    
        <!--====== Javascripts & Jquery ======-->
        <script src="{{{ URL::asset('js/jquery-3.2.1.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/bootstrap.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/jquery.slicknav.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/owl.carousel.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/jquery.nicescroll.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/jquery.zoom.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/jquery-ui.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/main.js')}}}"></script>
        @yield('scripts')
	</body>
</html>