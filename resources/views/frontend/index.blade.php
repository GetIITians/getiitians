@extends ('layouts.master')
@section('content')
    <div class="gutter-md"></div>

    <div class="container-fluid">
			<div class="row banner">
				<div class="col-sm-7">
					<img src="img/laptop.jpg" class="img-responsive">
				</div>
				<div class="col-sm-5">
					<p>1-on-1 online tuition by IITians</p>
					<div class="gutter-md"></div>
					<form action="/teachers" method="POST">
						{{ csrf_field() }}
						<div class="form-group row">
							<div class="col-xs-8 col-sm-8">
								<input type="text" class="form-control" id="indexSearch" name="search" placeholder="Mathematics / Physics / Chemistry">
								<small class="text-muted hidden-xs-down">You can search for any subject , class , topic or a particular teacher</small>
							</div>
							<div class="col-xs-4 col-sm-4">
								<button type="submit" class="btn btn-primary">Search</button>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-xs-offset-1 col-xs-11 col-sm-offset-8 col-sm-4">
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
				</div>
			</div>
			<div class="gutter-md"></div>
		</div>

		<div class="jumbotron jumbotron-fluid howitworks">
			<div class="container-fluid">
				<h1 class="display-3 text-center">How it works</h1>
				<div class="gutter-sm"></div>
				<div class="row">
					<div class="col-xs-6 col-sm-offset-2 col-sm-2">
						<img src="img/howitworks/home/search.png" class="img-responsive">
						<div class="gutter-xs"></div>
						<h2 class="text-center">Search</h2>
						<hr>
						<p class="text-justify">
							Search for any topic, subject or class that you want to study.
						</p>
					</div>
					<div class="col-xs-6 col-sm-2">
						<img src="img/howitworks/home/select.png" class="img-responsive">
						<div class="gutter-xs"></div>
						<h2 class="text-center">Select a Teacher</h2>
						<hr>
						<p class="text-justify">
							Shortlist a teacher from the list of teachers.
						</p>
					</div>
					<div class="col-xs-6 col-sm-2">
						<img src="img/howitworks/home/call.png" class="img-responsive">
						<div class="gutter-xs"></div>
						<h2 class="text-center">Call to connect</h2>
						<hr>
						<p class="text-justify">
							Call @ +91-9313394403 to connect with the teacher.
						</p>
					</div>
					<div class="col-xs-6 col-sm-2">
						<img src="img/howitworks/home/learn.png" class="img-responsive">
						<div class="gutter-xs"></div>
						<h2 class="text-center">Learn 1-on-1</h2>
						<hr>
						<p class="text-justify">
							Start your 1-on-1 session.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row numbers">
				<div class="col-xs-4">
					Teachers
					<ul class="count" data-count="102">
						<li>1</li>
						<li>0</li>
						<li>2</li>
					</ul>
				</div>
				<div class="col-xs-4">
					Students
					<ul class="count" data-count="100">
						<li>1</li>
						<li>0</li>
						<li>0</li>
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

		<div class="jumbotron jumbotron-fluid features">
			<div class="container">
				<h1 class="display-2 text-center">Features</h1>
				<hr>
				<!--
					<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
				-->
				<div class="gutter-sm"></div>
				<div class="row">
					<div class="col-xs-12 col-md-6 features-feature">
						<span><i class="material-icons md-18">list</i></span><h5>770+ Topics</h5>
						<p>More than 770 topics are covered by our teachers to make sure that your education is comprehensive.</p>
					</div>
					<div class="col-xs-12 col-md-6 features-feature">
						<span><i class="material-icons md-18">account_balance</i></span><h5>IITian teachers</h5>
						<p>Study from experienced &amp; qualified IITian teachers.</p>
					</div>
					<div class="col-xs-12 col-md-6 features-feature">
						<span><i class="material-icons md-18">book</i></span><h5>1-on-1 Tuition</h5>
						<p>We emphasize on 1-on-1 tuitions so that you get undivided attention from our teachers.</p>
					</div>
					<div class="col-xs-12 col-md-6 features-feature">
						<span><i class="material-icons md-18">home</i></span><h5>Online/Offline</h5>
						<p>Study from the comfort of your home, either in person or online.</p>
					</div>
				</div>
<!--
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="media">
							<div class="media-left">
								<i class="material-icons md-60">list</i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Teachers for every topic</h4>
								770+ Topics and 57+ Subjects to choose from.
							</div>
						</div>
						<div class="gutter-sm"></div>
						<div class="media">
							<div class="media-left">
								<i class="material-icons md-60">account_balance</i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Best of IITians</h4>
								Learn only from IITian Tutors.
							</div>
						</div>
						<div class="gutter-sm"></div>
						<div class="media">
							<div class="media-left">
								<i class="material-icons md-60">home</i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Online/Offline</h4>
								Study from the comfort of your home.
							</div>
						</div>
						<div class="gutter-sm"></div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="media">
							<div class="media-left">
								<i class="material-icons md-60">star</i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Feedback System</h4>
								Select the best tutor through reviews and ratings.
							</div>
						</div>
						<div class="gutter-sm"></div>
						<div class="media">
							<div class="media-left">
								<i class="material-icons md-60">book</i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Education Quality</h4>
								Because we care about Quality Education more.
							</div>
						</div>
						<div class="gutter-sm"></div>
					</div>
				</div>
-->
			</div>
		</div>

		<div id="index-reviews" class="carousel slide" data-ride="carousel">
<!--
			<ol class="carousel-indicators">
				<li data-target="#index-reviews" data-slide-to="0" class="active"></li>
				<li data-target="#index-reviews" data-slide-to="1"></li>
				<li data-target="#index-reviews" data-slide-to="2"></li>
			</ol>
-->
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<div class="row">
						<div class="col-xs-offset-1 col-xs-10 col-sm-8">
							<div class="carousel-caption">
								<h3>Yug Dassani</h3>
								<p>Excellent class. Exceptional explanations and extremely helpful made chemistry easy!!</p>
							</div>
						</div>
						<div class="col-sm-offset-1 col-sm-2 hidden-xs-down">
							<img src="http://getiitians.com/teaching/data/files/1447573588_38_7418d51ec.jpg" alt="First slide" class="img-responsive">
						</div>
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

		<div class="container-fluid joinus">
			<div class="row">
				<div class="col-xs-8 col-sm-offset-1 col-sm-7">
					<h2>Are you an IITian?</h2>
					<h2>Dou you like tutoring students?</h2>
					<h2>If yes, then be part of our community.</h2>
				</div>
				<div class="col-xs-4">
					<a href="http://getiitians.com/teaching/joinus" role="button" class="btn btn-dark">Join Us</a>
				</div>
			</div>
		</div>
@endsection