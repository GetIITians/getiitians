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

    <link rel="stylesheet" href="{{ elixir('css/style.css') }}">
</head>
<body>

<nav class="navbar navbar-light bg-red">
    <a class="navbar-brand" href="/">
        <img src="/img/logo.png">
    </a>
    <span class="tagline pull-left hidden-md-down">private tutoring by IITians</span>
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <i class="material-icons md-18">dehaze</i>
    </button>
    <div class="collapse navbar-toggleable-xs" id="collapsingNavbar">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link phone-no">
                    +91-8447731863
                </a>
            </li>
            <li class="nav-item {{matchValue('home',$page,'active')}}">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{matchValue('about',$page,'active')}}">
                <a class="nav-link" href="/about">About Us</a>
            </li>
            <li class="nav-item {{matchValue('teachers',$page,'active')}}">
                <a class="nav-link" href="/teachers">Teachers</a>
            </li>
            <li class="nav-item {{matchValue('contact',$page,'active')}}">
                <a class="nav-link" href="/contact">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ env('TEACHING_LINK') }}joinus">Become a teacher</a>
            </li>
            <?php /* ?>
            <li class="nav-item">
                <a class="nav-link" href="{{ env('TEACHING_LINK') }}login">Login</a>
            </li>
            <li class="nav-item">
                <a id="signup" class="nav-link" href="{{ env('TEACHING_LINK') }}signup">Signup</a>
            </li>
            <?php */ ?>
            @if (Auth::guest())
                <li class="nav-item {{matchValue('signup',$page,'active')}}">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item {{matchValue('signup',$page,'active')}}">
                    <a id="signup" class="nav-link" href="/signup">Signup</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile/{{Auth::user()->id}}">{{ Auth::user()->name }}</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
<div id="signup-tooltip">
    <span class="arrow-up"></span>
    Sign up and get a <b>FREE</b> Demo now!
</div>
<!-- Header Ends -->
@include('layouts.includes.flash')
@yield('content')
        <div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="container-fluid">
                        <div class="row modal-custom-header">
                            <div class="col-xs-12">
                                <button type="button" class="close" id="enquiryModalDismiss" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5>Have a doubt? Need personal tuition? Please enter the details below &amp; we will revert within 24 Hours.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="/teachers/enquiry" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">Email <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="phone" class="form-control-label">Phone</label>
                                            <input type="text" class="form-control" id="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="enquiry" class="form-control-label">Enquiry <span class="required">*</span></label>
                                            <textarea class="form-control" id="enquiry" rows="4" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <small></small>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row modal-custom-footer">
                            <div class="col-xs-12">
                                <i class="material-icons md-18">contact_phone</i>&nbsp;&nbsp;<span>Any Queries? Don't hesitate to call us @ +91 93133 94403 or email at info@getiitians.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Footer Begins -->
<div class="jumbotron jumbotron-fluid doubt">
    <div class="container-fluid">
        <h1>Have a doubt ?</h1>
        <div class="gutter-sm"></div>
        <form class="row" action="/teachers/enquiry" method="POST">
            {{ csrf_field() }}
            <div class="col-xs-12 col-lg-4">
                <div class="form-group row">
                    <div class="col-xs-3">
                        <label for="class" class="form-control-label">Class</label>
                    </div>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" id="class" placeholder="Class">
                    </div>
                </div>
                <div class="gutter-xs"></div>
                <div class="form-group row">
                    <div class="col-xs-3">
                        <label for="subject" class="form-control-label">Subject</label>
                    </div>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                    </div>
                </div>
                <div class="gutter-xs"></div>
                <div class="form-group row">
                    <div class="col-xs-3">
                        <label for="topic" class="form-control-label">Topic</label>
                    </div>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" id="topic" placeholder="Topic">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-4">
                <div class="form-group row">
                    <div class="col-xs-3">
                        <label for="enquiry" class="form-control-label">Enquiry<span class="required">&nbsp;*&nbsp;</span></label>
                    </div>
                    <div class="col-xs-8 col-sm-9">
                        <textarea class="form-control" id="enquiry" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-4">
                <div class="form-group row">
                    <div class="col-xs-3">
                        <label for="email" class="form-control-label">Email<span class="required">&nbsp;*&nbsp;</span></label>
                    </div>
                    <div class="col-xs-9">
                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="gutter-xs"></div>
                <div class="form-group row">
                    <div class="col-xs-3">
                        <label for="phone" class="form-control-label">Phone</label>
                    </div>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" id="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="gutter-xs"></div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary-reverse">Submit</button>
                        <span class="required">&nbsp;*&nbsp;</span><small class="text-muted"> Starred fields are compulsory</small>
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
            <div class="col-xs-12 col-sm-6 col-md-5">
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="#">+91 93133 94403</a>
                    </li>
                    <li>
                        <a href="#">info@getiitians.com</a>
                    </li>
                    <!--
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
                    -->
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-4">
                <!--
                    <span class="pull-right">Social icons</span>
                -->
            </div>
        </div>
    </div>
</footer>
<div id="flashMessage">

</div>

<script src="/js/vendor/jquery-2.1.4.min.js"></script>
<script src="/js/vendor/tether.min.js"></script>
<script src="/js/vendor/bootstrap/alert.js"></script>
<script src="/js/vendor/bootstrap/button.js"></script>
<script src="/js/vendor/bootstrap/carousel.js"></script>
<script src="/js/vendor/bootstrap/collapse.js"></script>
<script src="/js/vendor/bootstrap/dropdown.js"></script>
<script src="/js/vendor/bootstrap/modal.js"></script>
<script src="/js/vendor/bootstrap/tooltip.js"></script>
<script src="/js/vendor/bootstrap/popover.js"></script>
<script src="/js/vendor/bootstrap/scrollspy.js"></script>
<script src="/js/vendor/bootstrap/tab.js"></script>
<script src="/js/vendor/bootstrap/util.js"></script>
<script src="/js/vendor/bootstrap-datepicker.min.js"></script>

<script src="/js/all.js"></script>
<!--
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></'
            + 'script>')</script>
-->
</body>
</html>
