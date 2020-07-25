<?php
    use App\Http\Controllers\Controller;
        $mainCategories = Controller::mainCategories();
?>

<header id="header"><!--header-->
<div class="header_top"><!--header_top-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="contactinfo">
                    <ul class="nav nav-pills">
                        <li><a href="tel:+911800-9960"><i class="fa fa-phone"></i> +91 1800-9960</a></li>
                        <li><a href="mailto:help@tracker.com"><i class="fa fa-envelope"></i> help@tracker.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="social-icons pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header_top-->
<!--header-middle-->
<div class="header-middle">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    <a href="{{url('/')}}">
                        <h1 class="fa fa-shopping-cart">TRACKER</h1>
                    </a>
                </div>
                <div class="btn-group pull-right"></div>
                </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('/orders')}}"><i class="fa fa-crosshairs"></i> Order</a></li>
                        @if(empty(Auth::check()))
                            <li><a href="{{url('/login-register')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <li><a href="{{url('/login-register')}}"><i class="fa fa-lock"></i> Login</a></li>
                        @else
                            <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <li><a href="{{url('/account')}}"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="{{url('/user-logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                    <li><a href="{{url('/')}}" class="active">Home</a></li>
                        <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                @foreach($mainCategories as $cat)
                            <li><a href="{{url('products/'.$cat->url)}}">{{$cat->Name}}</a></li>
                                @endforeach
                            </ul>
                        </li>  
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                @if(!empty(Auth::check()))
                <form action="{{ url('/')}}" method="get" class="form-inline">
                    <div class="form-group">
                    <input type="text" class="form-control" style="width:100%;" name="s" placeholder="Keyword" value="{{isset($s) ? $s : ''}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div><!--/header-bottom-->
</header><!--/header-->