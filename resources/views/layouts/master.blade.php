<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>getIITians</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/vendor/holder.min.js"></script>
</head>
<body>
<nav class="navbar navbar-light bg-red">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        &#9776;
    </button>
    <div class="collapse navbar-toggleable-xs" id="collapsingNavbar">
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png">
        </a>
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item">
                <a class="nav-link">
                    +91-9313394403
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/teachers">Teachers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Enquiry</a>
            </li>
            @if (Auth::guest())
                <li class="nav-item">
                    <a class="nav-link" href="/auth/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/auth/register">Signup</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/auth/logout">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
<!-- Header Ends -->
@include('layouts.includes.flash')
@yield('content')
<!-- Footer Begins -->
<div class="jumbotron jumbotron-fluid doubt">
    <div class="container-fluid">
        <h1>Have a doubt ?</h1>
        <div class="gutter-sm"></div>
        <form class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group row">
                    <label for="class" class="col-sm-3 form-control-label">Class</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="class" placeholder="Class">
                    </div>
                </div>
                <div class="gutter-xs"></div>
                <div class="form-group row">
                    <label for="subject" class="col-sm-3 form-control-label">Subject</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                    </div>
                </div>
                <div class="gutter-xs"></div>
                <div class="form-group row">
                    <label for="topic" class="col-sm-3 form-control-label">Topic</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="topic" placeholder="Topic">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="form-group row">
                    <label for="enquiry" class="col-sm-3 form-control-label">Enquiry<span class="required">&nbsp;*&nbsp;</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="enquiry" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="form-group row">
                    <label for="email" class="col-sm-3 form-control-label">Email<span class="required">&nbsp;*&nbsp;</span></label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="gutter-xs"></div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 form-control-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="gutter-xs"></div>
                <div class="form-group row">
                    <label for="topic" class="col-sm-3 form-control-label"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary-reverse">Submit</button>
                        <small class="text-muted"><span class="required">&nbsp;*&nbsp;</span> Starred fields are compulsory</small>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<footer>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-3">
                Copyright &copy; getIITians.com
            </div>
            <div class="col-xs-12 col-sm-5">
                <ul>
                    <li>
                        <a href="">Home</a>
                    </li>
                    <li>
                        <a href="">About Us</a>
                    </li>
                    <li>
                        <a href="">Site Map</a>
                    </li>
                    <li>
                        <a href="">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="">Terms &amp; Conditions</a>
                    </li>
                    <li>
                        <a href="">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12  col-sm-4">
                <span class="pull-right">Social icons</span>
            </div>
        </div>
    </div>
</footer>

<script src="js/vendor/jquery-2.1.4.min.js"></script>
<script src="js/helpers.js"></script>

<script src="js/index.js"></script>

<script src="js/vendor/bootstrap/alert.js"></script>
<script src="js/vendor/bootstrap/button.js"></script>
<script src="js/vendor/bootstrap/carousel.js"></script>
<script src="js/vendor/bootstrap/collapse.js"></script>
<script src="js/vendor/bootstrap/dropdown.js"></script>
<script src="js/vendor/bootstrap/modal.js"></script>
<script src="js/vendor/bootstrap/tooltip.js"></script>
<script src="js/vendor/bootstrap/popover.js"></script>
<script src="js/vendor/bootstrap/scrollspy.js"></script>
<script src="js/vendor/bootstrap/tab.js"></script>
<script src="js/vendor/bootstrap/util.js"></script>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></'
            + 'script>')</script>

</body>
</html>