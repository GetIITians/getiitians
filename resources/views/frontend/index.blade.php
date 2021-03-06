@extends ('layouts.master')
@section('content')
    <div class="gutter-md"></div>

    <div class="container-fluid">
			<div class="row banner">
				<div class="col-xs-12 col-lg-7">
					<img src="img/laptop.jpg" class="img-responsive">
				</div>
				<div class="col-xs-12 col-lg-5">
					<p>1-to-1 tuition by IITians from anywhere</p>
					<div class="gutter-md"></div>
					<form action="/teachers" method="POST">
						{{ csrf_field() }}
						<div class="form-group row">
							<div class="col-xs-8 col-sm-8">
								<input type="text" class="form-control" id="indexSearch" name="search" placeholder="Mathematics / Physics / Chemistry">
								<small class="text-muted hidden-xs-down">You can search for any subject , class , topic or a particular teacher</small>
							</div>
							<div class="col-xs-4 col-sm-4">
								<button type="submit" class="btn btn-red">Search</button>
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
					<div class="col-xs-12 col-sm-4 step">
						<img src="img/howitworks/home/search.png" class="img-responsive">
						<div class="gutter-xs"></div>
						<h2 class="text-center">Select your requirement</h2>
						<hr>
						<p>
							Are you preparing for competitive exam or studying for board, have doubt or wish to study particular topic or need teacher for revision of upcoming exam.
						</p>
					</div>
					<div class="col-xs-12 col-sm-4 step">
						<img src="img/howitworks/home/select.png" class="img-responsive">
						<div class="gutter-xs"></div>
						<h2 class="text-center">Select a Teacher</h2>
						<hr>
						<p>
							Choose from the list of our esteemed teacher ,speak to them before demo and book your first <b>FREE</b> demo class.
						</p>
					</div>
					<div class="col-xs-12 col-sm-4 step">
						<img src="img/howitworks/home/learn.png" class="img-responsive">
						<div class="gutter-xs"></div>
						<h2 class="text-center">Learn 1-to-1</h2>
						<hr>
						<p class="text-justify">
							Study 1-to-1 as per your requirement. View recorded classes anytime for future reference.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row numbers">
				<div class="col-xs-4">
					Teachers
					<ul class="count" data-count="55">
						<li>0</li>
					</ul>
				</div>
				<div class="col-xs-4">
					Students
					<ul class="count" data-count="200">
						<li>0</li>
					</ul>
				</div>
				<div class="col-xs-4">
					Topics
					<ul class="count" data-count="770">
						<li>0</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="jumbotron jumbotron-fluid features">
			<div class="container">
				<h1 class="display-1 text-center">Attributes of 1-to-1 tutoring</h1>
				<hr>
				<!--
					<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
				-->
				<div class="gutter-sm"></div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 features-feature">
						<div class="row">
							<div class="col-xs-3 icon">
								<i class="material-icons md-48">person</i>
							</div>
							<div class="col-xs-9">
								<ul>
									<h5>Personalized 1-to-1 tutoring</h5>
									<li>Dedicated attention to the student</li>
									<li>Moving at student's speed</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 features-feature">
						<div class="row">
							<div class="col-xs-3 icon">
								<i class="material-icons md-48">access_time</i>
							</div>
							<div class="col-xs-9">
								<ul>
									<h5>Flexibility of time</h5>
									<li>Save on commute time</li>
									<li>Study at your own convenient time</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 features-feature">
						<div class="row">
							<div class="col-xs-3 icon">
								<i class="material-icons md-48">playlist_add</i>
							</div>
							<div class="col-xs-9">
								<ul>
									<h5>Study any topic</h5>
									<li>Study any particular topic</li>
									<li>Take multiple sessions for one topic</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 features-feature">
						<div class="row">
							<div class="col-xs-3 icon">
								<i class="material-icons md-48">group_work</i>
							</div>
							<div class="col-xs-9">
								<ul>
									<h5>Better than coaching</h5>
									<li>Ask any number of doubts without hesitation</li>
									<li>Design your own study plan</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 features-feature">
						<div class="row">
							<div class="col-xs-3 icon">
								<i class="material-icons md-48">desktop_mac</i>
							</div>
							<div class="col-xs-9">
								<ul>
									<h5>Superior to recorded lecture</h5>
									<li>Ask doubts anytime during the session</li>
									<li>Personal counselling</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 features-feature">
						<div class="row">
							<div class="col-xs-3 icon">
								<i class="material-icons md-48">home</i>
							</div>
							<div class="col-xs-9">
								<ul>
									<h5>Study anywhere</h5>
									<li>Study at place of your choice - Home, Online or Center</li>
									<li>Hassle free parents of drop , pick-up tension</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container why-getIITians">
			<div class="row">
				<div class="col-xs-12">
					<h2 class="display-1 text-center">Why getIITians?</h2>
					<hr>
				</div>
			</div>
			<div class="card-deck">
				<div class="row">
					<div class="card text-xs-center col-xs-12 col-sm-4">
						<div class="card-block">
							<h4 class="card-title">IITian teachers</h4>
							<i class="material-icons md-120">group</i>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Teacher who have successful cleared these exams</li>
							<li class="list-group-item">Strong emphasis on concepts</li>
							<li class="list-group-item">Personal mentoring for facing competition</li>
							<li class="list-group-item">Well versed with students psychology</li>
						</ul>
					</div>
					<div class="card text-xs-center col-xs-12 col-sm-4">
						<div class="card-block">
							<h4 class="card-title">Dedicated academic team</h4>
							<i class="material-icons md-120">email</i>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Updated curriculum for competitive,board exams</li>
							<li class="list-group-item">Designing tests &amp; analysis</li>
							<li class="list-group-item">Rigorous study of exam pattern,last year paper</li>
							<li class="list-group-item">Formulating revision strategy</li>
							<li class="list-group-item">Regular follow up with Parents - Teacher meet</li>
						</ul>
					</div>
					<div class="card text-xs-center col-xs-12 col-sm-4">
						<div class="card-block">
							<h4 class="card-title">Customized syllabus</h4>
							<i class="material-icons md-120">event_note</i>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Register for a single topic also</li>
							<li class="list-group-item">Learn at your own pace</li>
							<li class="list-group-item">Balance between school,self-study and other classes</li>
							<li class="list-group-item">Detailed study planner per student</li>
						</ul>
					</div>
				</div>
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
						<div class="col-sm-offset-1 col-sm-2 hidden-sm-down">
							<img src="{{ env('TEACHING_LINK') }}data/files/1447573588_38_7418d51ec.jpg" alt="First slide" class="img-responsive">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="row">
						<div class="col-xs-offset-1 col-xs-10 col-sm-8">
							<div class="carousel-caption">
								<h3>Stuti Sharma</h3>
								<p>Sir thank you so much for helping me clarify my doubts. Your teaching was very clear and I could understand it easily.</p>
							</div>
						</div>
						<div class="col-sm-offset-1 col-sm-2 hidden-sm-down">
							<img src="{{ env('TEACHING_LINK') }}data/files/1448888698_76_30e7c9678.png" alt="First slide" class="img-responsive">
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
					<h2>Do you like tutoring students?</h2>
					<h2>If yes, then be part of our community.</h2>
				</div>
				<div class="col-xs-4">
					<a href="{{ env('TEACHING_LINK') }}joinus" role="button" class="btn btn-dark">Join Us</a>
				</div>
			</div>
		</div>
@endsection
