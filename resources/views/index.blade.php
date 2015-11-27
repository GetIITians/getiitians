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

		<link rel="stylesheet" href="css/style.css">
		<script src="js/vendor/holder.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-light bg-red">
			<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
				&#9776;
			</button>
			<div class="collapse navbar-toggleable-xs" id="collapsingNavbar">
				<a class="navbar-brand" href="index.html">
					<img src="img/logo.png">
				</a>
				<ul class="nav navbar-nav pull-right">
					<li class="nav-item">
						<a class="nav-link">
							+91-9313394403
						</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="teachers.html">Teachers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Enquiry</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="profile.html">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" data-toggle="modal" data-target="#signup">Signup</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="gutter-md"></div>
		<!--  -->
		<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signupLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h2 class="modal-title text-center">Signup</h2>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-offset-2 col-xs-8">
								<a class="oauth" href="">facebook</a><a href="" class="pull-right oauth">google</a>
							</div>
							<form class="col-xs-offset-2 col-xs-8">
								<fieldset class="form-group">
									<label class="sr-only" for="name">Full name</label>
									<div class="input-group">
										<div class="input-group-addon">Full name</div>
										<input type="text" class="form-control" id="name" placeholder="Full name">
									</div>
								</fieldset>
								<fieldset class="form-group">
									<label class="sr-only" for="email">Email address</label>
									<div class="input-group">
										<div class="input-group-addon">Email address</div>
										<input type="email" class="form-control" id="email" placeholder="Enter email">
									</div>
									<small class="text-muted">We'll never share your email with anyone else.</small>
								</fieldset>
								<fieldset class="form-group">
									<label class="sr-only" for="password">Password</label>
									<div class="input-group">
										<div class="input-group-addon">Password</div>
										<input type="password" class="form-control" id="password" placeholder="Password">
									</div>
								</fieldset>
								<fieldset class="form-group">
									<label class="sr-only" for="password">Password repeat</label>
									<div class="input-group">
										<div class="input-group-addon">Password repeat</div>
										<input type="password" class="form-control" id="password" placeholder="Repeat password">
									</div>
								</fieldset>
								<div class="radio">
									Sign up as : 
									<label class="radio-inline">
										<input type="radio" name="signuptype" id="signuptype" value="student"> Student
									</label>
									<label class="radio-inline">
										<input type="radio" name="signuptype" id="signuptype" value="teacher"> Teacher
									</label>
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-xs-offset-3 col-xs-6">
								<button type="button" class="btn btn-primary">SUBMIT</button>
								<small class="text-muted text-left">By clicking on submit, you agree to our terms of use.</small>
							</div>
						</div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->





		<!-- Header Ends -->
		<div class="container-fluid">
			<div class="row banner">
				<div class="col-sm-7">
					<img src="img/laptop.png" class="img-responsive">
				</div>
				<div class="col-sm-5">
					<p>1-on-1 online tuition by IITians</p>
					<div class="gutter-md"></div>
					<form>
						<div class="form-group row">
							<div class="col-sm-8">
								<input type="text" class="form-control" id="indexSearch" placeholder="Mathematics / Electromagnetics / IITJEE">
								<small class="text-muted hidden-xs-down">You can search for any subject , class , topic or a particular teacher</small>
							</div>
							<div class="col-sm-4">
								<button type="submit" class="btn btn-primary">Search</button>
								<div class="gutter-xs"></div>
								<div class="checkbox">
									<label class="c-input c-checkbox">
										<input type="checkbox" checked><span class="c-indicator"></span> Home Tuition
									</label>
									<label class="c-input c-checkbox">
										<input type="checkbox" checked><span class="c-indicator"></span> Online Tuition
									</label>
								</div>

							</div>
						</div>
					</div>
				</form>


				</div>
			</div>
			<div class="gutter-md"></div>

<!-- 			<form class="indexSearch">
	<div class="form-group row">				
		<div class="col-sm-10">
			<label class="sr-only" for="indexSearch">Search</label>
			<input type="text" class="form-control" id="indexSearch" placeholder="Mathematics / Electromagnetics / IITJEE">
			<small class="text-muted hidden-xs-down">You can search for any subject , class , topic or a particular teacher</small>
		</div>
		<div class="col-sm-2">
			<button type="submit" class="btn btn-primary">Search</button>
			<div class="gutter-xs"></div>
			<div class="checkbox">
				<label class="c-input c-checkbox">
					<input type="checkbox" checked><span class="c-indicator"></span> Home Tuition
				</label>
				<label class="c-input c-checkbox">
					<input type="checkbox" checked><span class="c-indicator"></span> Online Tuition
				</label>
			</div>
		</div>
	</div>
</form>
 -->

		</div>

		<div class="jumbotron jumbotron-fluid howitworks">
			<div class="container">
				<h1 class="display-3 text-center">How it works</h1>
				<div class="gutter-sm"></div>
				<div class="row">
					<div class="col-sm-3">
						<img src="img/placeholder.png" class="img-responsive">
						<div class="gutter-xs"></div>
						<h2 class="text-center">Lorem Ipsum</h2>
						<hr>
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sapien dui, efficitur facilisis suscipit eget, volutpat sed felis. Morbi sed tincidunt dolor. Cras iaculis nec massa et ullamcorper. Fusce pretium nulla ac placerat porta.
						</p>
					</div>
					<div class="col-sm-3">
						<img src="img/placeholder.png" class="img-responsive">
						<div class="gutter-xs"></div>
						<h2 class="text-center">Lorem Ipsum</h2>
						<hr>
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed tincidunt dolor. Cras iaculis nec massa et ullamcorper. Fusce pretium nulla ac placerat porta.
						</p>
					</div>
					<div class="col-sm-3">
						<img src="img/placeholder.png" class="img-responsive">
						<div class="gutter-xs"></div>
						<h2 class="text-center">Lorem Ipsum</h2>
						<hr>
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sapien dui, efficitur facilisis suscipit eget, volutpat sed felis.
						</p>
					</div>
					<div class="col-sm-3">
						<img src="img/placeholder.png" class="img-responsive">
						<div class="gutter-xs"></div>
						<h2 class="text-center">Lorem Ipsum</h2>
						<hr>
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sapien dui, efficitur facilisis suscipit eget, volutpat sed felis. Morbi sed tincidunt dolor. Cras iaculis nec massa et ullamcorper.
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="jumbotron jumbotron-fluid features">
			<div class="container">
				<h1 class="display-2 text-center">Features</h1>
				<hr>
				<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
				<div class="gutter-sm"></div>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="media">
							<div class="media-left">
								<i class="material-icons md-60">account_balance</i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Feature heading</h4>
								Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
							</div>
						</div>
						<div class="gutter-sm"></div>
						<div class="media">
							<div class="media-left">
								<i class="material-icons md-60">question_answer</i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Feature heading</h4>
								Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
							</div>
						</div>
						<div class="gutter-sm"></div>
						<div class="media">
							<div class="media-left">
								<i class="material-icons md-60">verified_user</i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Feature heading</h4>
								Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
							</div>
						</div>
						<div class="gutter-sm"></div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="media">
							<div class="media-left">
								<i class="material-icons md-60">trending_up</i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Feature heading</h4>
								Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
							</div>
						</div>
						<div class="gutter-sm"></div>
						<div class="media">
							<div class="media-left">
								<i class="material-icons md-60">videocam</i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Feature heading</h4>
								Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
							</div>
						</div>
						<div class="gutter-sm"></div>
						<div class="media">
							<div class="media-left">
								<i class="material-icons md-60">headset_mic</i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Feature heading</h4>
								Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--
		<div id="index-reviews" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#index-reviews" data-slide-to="0" class="active"></li>
				<li data-target="#index-reviews" data-slide-to="1"></li>
				<li data-target="#index-reviews" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<div class="row">
						<div class="col-xs-8">
							<div class="carousel-caption">
								<h3>ABCDEFGHI</h3>
								<p>...</p>
							</div>
						</div>
						<div class="col-xs-4">
							<img data-src="holder.js/150x500/auto/#777:#555/text:First slide" alt="First slide" class="pull-right">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img data-src="holder.js/200x500/auto/#666:#444/text:Second slide" alt="Second slide">
					<div class="carousel-caption">
						<h3>JKLMNOPQR</h3>
						<p>...</p>
					</div>
				</div>
				<div class="carousel-item">
					<img data-src="holder.js/300x500/auto/#555:#333/text:Third slide" alt="Third slide">
					<div class="carousel-caption">
						<h3>STUVWXYZ</h3>
						<p>...</p>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#index-reviews" role="button" data-slide="prev">
				<span class="icon-prev" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#index-reviews" role="button" data-slide="next">
				<span class="icon-next" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
-->

		<div class="container-fluid">
			<div class="row numbers">
				<div class="col-xs-4">
					Teachers
					<ul class="count" data-count="86">
						<li>8</li>
						<li>6</li>
					</ul>
				</div>
				<div class="col-xs-4">
					Students
					<ul class="count" data-count="87">
						<li>8</li>
						<li>7</li>
					</ul>
				</div>
				<div class="col-xs-4">
					Topics
					<ul class="count" data-count="770">
						<li>7</li>
						<li>7</li>
						<li>0</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Footer Begins -->
		<div class="gutter-md"></div>
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