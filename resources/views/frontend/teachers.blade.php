@extends ('layouts.master')
@section('content')
		<div class="gutter-sm"></div>
		<div class="container-fluid" id="teachers">
			<div class="row">
				<main class="col-xs-12">
					<div class="row">
						@foreach ($teachers as $teacher)
							<div class="col-xs-12 col-sm-4 teacher">
								<div class="row">
									<div class="col-xs-4 dp">
										<img src="http://getiitians.com/teaching/{{$teacher['image']}}" class="img-responsive-flex">
									</div>
									<div class="col-xs-8">
										<h4 class="card-title">{{ ucwords(strtolower($teacher['name'])) }}</h4>
										<small>{{ $teacher['degree'] }} [ IIT {{ $teacher['college'] }} ]</small>
										<hr>
										<p>{{ $teacher['introduction'] }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<small class="text-muted">
											@foreach ($teacher['subject'] as $subject)
												{{ $subject."  " }}
											@endforeach
										</small>
										<p>
											<i class="material-icons md-14">star_border</i> <span>
												@if ($teacher['rating'] == '0')
													Not rated yet
												@else
													{{ $teacher['rating'] }}
												@endif
											<small></small> ₹ {{ $teacher['fees'] }}/ per hour</span>
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<a href="profile.html" role="button" class="btn btn-dark">View profile</a>
										<a href="class.html" role="button" class="btn btn-dark">Book a class</a>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</main>
			</div>
		</div>

@endsection
