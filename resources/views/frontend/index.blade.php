@extends ('layouts.master')
@section('content')
    <div class="gutter-md"></div>

    <div class="container-fluid">
			<div class="row banner">
				<div class="col-sm-7">
					<img src="img/laptop.png" class="img-responsive">
				</div>
				<div class="col-sm-5">
					<p>1-on-1 online tuition by IITians</p>
					<div class="gutter-md"></div>
					<form  action="/teachers" method="POST">
			            {{ csrf_field() }}
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
								<h3>Yug Dassani</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</div>
						<div class="col-xs-4">
							<img src="img/man.jpg" alt="First slide" class="img-responsive">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="row">
						<div class="col-xs-8">
							<div class="carousel-caption">
								<h3>Yug Dassani</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</div>
						<div class="col-xs-4">
							<img src="img/man.jpg" alt="First slide" class="img-responsive">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="row">
						<div class="col-xs-8">
							<div class="carousel-caption">
								<h3>Yug Dassani</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</div>
						<div class="col-xs-4">
							<img src="img/man.jpg" alt="First slide" class="img-responsive">
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
@endsection