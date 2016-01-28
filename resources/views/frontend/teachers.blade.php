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
										<a href="#" role="button" class="btn btn-dark">
											<i class="material-icons md-18">ring_volume</i>
											<span>Call</span>
										</a>
										<a href="#" role="button" class="btn btn-dark" data-toggle="modal" data-target="#messageModal" data-name="{{ ucwords(strtolower($teacher['name'])) }}">
											<i class="material-icons md-18">message</i>
											<span>Message</span>
										</a>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</main>
			</div>
		</div>
		<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="messageModalLabel">Send a Message</h4>
					</div>
					<div class="modal-body">
						<form action="/teachers/message" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="recipient" class="form-control-label">Recipient:</label>
								<input type="text" class="form-control" id="recipient">
							</div>
							<div class="form-group">
								<label for="message" class="form-control-label">Message:</label>
								<textarea class="form-control" id="message"></textarea>
							</div>
						</form>
						<small>The message to be sent can't be empty</small>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-xs-6"><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button></div>
							<div class="col-xs-6"><button type="button" class="btn btn-primary" id="messageModalSubmit">Send message</button></div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection