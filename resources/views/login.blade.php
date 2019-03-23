<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title>HolaHalo Catalog | Login</title>
        <meta charset="UTF-8">
        <meta name="description" content=" Divisima | eCommerce Template">
        <meta name="keywords" content="divisima, eCommerce, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link href="img/icon.ico" rel="shortcut icon"/>

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
                        <div class="col-lg-12 text-center text-lg-center">
                            <!-- logo -->
                            <a href="{{route('index')}}" class="site-logo">
                                <img src="img/hola-halo.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header section end -->
        
        @if(Session::has('message'))
        <p class="alert alert-danger" role="alert">
            {{ Session::get('message') }}
        </p>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-lg-4 order-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Login Form</h5>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary col-lg-12">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1">
                </div>
            </div>
        </div>

        <!--====== Javascripts & Jquery ======-->
        <script src="{{{ URL::asset('js/jquery-3.2.1.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/bootstrap.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/jquery.slicknav.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/owl.carousel.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/jquery.nicescroll.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/jquery.zoom.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/jquery-ui.min.js')}}}"></script>
        <script src="{{{ URL::asset('js/main.js')}}}"></script>
    </body>
</html>