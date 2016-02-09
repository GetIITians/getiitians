@extends ('layouts.master')
@section('content')
		<div class="gutter-sm"></div>
		<div class="container-fluid" id="teachers">
			<div class="row what-to-do">
				<div class="col-xs-12 col-md-offset-1 col-md-2">
					<img src="img/howitworks/teachers/select.png" class="img-responsive">
				</div>
				<div class="col-xs-12 col-md-offset-2 col-md-2">
					<img src="img/howitworks/teachers/message.png" class="img-responsive">
				</div>
				<div class="col-xs-12 col-md-offset-2 col-md-2">
					<img src="img/howitworks/teachers/learn.png" class="img-responsive">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<form action="/teachers" method="POST">
						{{ csrf_field() }}
						<div class="form-group row">
							<div class="col-xs-offset-1 col-xs-7">
								<input type="text" class="form-control" id="indexSearch" name="search" placeholder="Mathematics / Electromagnetics / IITJEE">
								<small class="text-muted hidden-xs-down">You can search for any subject , class , topic or a particular teacher</small>
							</div>
							<div class="col-xs-3">
								<button type="submit" class="btn btn-primary">Search</button>
							</div>
						</div>
					</form>
				</div>
				@if (old('search') != '')
				<div class="col-xs-offset-1 col-xs-11">
					@if ($results)
					<p>Showing results for '{{ old('search') }}'</p>
					@else
					<p>
						We're sorry but we couldn't find any results for '{{ old('search') }}'. 
						Please try changing your search query to something more relevant.
					</p>
					@endif
				</div>
				@endif
			</div>
			<div class="row">
				<main class="col-xs-12">
					<div class="row">
						@foreach ($teachers as $teacher)
							<div class="col-xs-12 col-sm-4 teacher">
								<div class="row">
									<div class="col-xs-4 dp">
										<img src="{{ $imglink }}{{$teacher['image'] }}" class="img-responsive-flex">
									</div>
									<div class="col-xs-8">
										<h4 class="card-title">{{ ucwords(strtolower($teacher['name'])) }}</h4>
										<small>{{ $teacher['degree'] }} [ {{ $teacher['college'] }} ]</small>
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
										<a href="#" role="button" class="btn btn-dark" data-toggle="modal" data-target="#callModal">
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
						<h4 class="modal-title" id="messageModalLabel">Send a Message to teacher</h4>
					</div>
					<div class="modal-body">
						<form action="/teachers/message" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="recipient" class="form-control-label">Teacher's Name:</label>
								<input type="text" class="form-control" id="recipient">
							</div>
							<div class="form-group">
								<label for="message" class="form-control-label">Your Message:</label>
								<textarea class="form-control" id="message" required></textarea>
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
					<div class="container-fluid">
						<div class="row modal-custom-footer">
							<div class="col-xs-1">
								<i class="material-icons md-18">contact_phone</i>
							</div>
							<div class="col-xs-11">
								<span>Don't hesitate to call us @ +91 93133 94403 or email at info@getiitians.com</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
									<button type="button" class="close" id="enquiryModalDismiss" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h5>Have a doubt? Need personal tuition? Please enter the details below &amp; we will revert within 24 Hours.</h5>
								</div>
							</div>
							<hr>
							<form action="/teachers/enquiry" method="POST">
								{{ csrf_field() }}
								<div class="row">
									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="class" class="form-control-label">Class</label>
											<input type="text" class="form-control" id="class">
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="subject" class="form-control-label">Subject</label>
											<input type="text" class="form-control" id="subject">
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="topic" class="form-control-label">Topic</label>
											<input type="text" class="form-control" id="topic">
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
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="email" class="form-control-label">Email <span class="required">*</span></label>
											<input type="text" class="form-control" id="email" required>
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="phone" class="form-control-label">Phone</label>
											<input type="text" class="form-control" id="phone">
										</div>
									</div>
								</div>
								<small></small>
								<hr>
								<div class="row">
									<div class="col-xs-6">
										<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
									</div>
									<div class="col-xs-6">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row modal-custom-footer">
							<div class="col-xs-1">
								<i class="material-icons md-18">contact_phone</i>
							</div>
							<div class="col-xs-11">
								<span>Any Queries? Don't hesitate to call us @ +91 93133 94403 or email at info@getiitians.com</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="callModal" tabindex="-1" role="dialog" aria-labelledby="callModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-call" role="document">
				<div class="modal-content">
					<div class="container-fluid">
						<div class="row modal-custom">
							<div class="col-xs-12">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<img src="img/call.png" class="img-responsive">
								<p>Call us @ +91 93133 94403 to connect with the teacher. </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#enquiryModal">Enquiry</button>
		-->
@endsection