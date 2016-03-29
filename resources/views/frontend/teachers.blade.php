@extends ('layouts.master')
@section('content')
		<div class="gutter-sm"></div>
		<div class="container-fluid" id="teachers">
			<div class="row what-to-do">
				<div class="col-xs-4 col-md-offset-1 col-md-2">
					<img src="img/howitworks/teachers/select.png">
				</div>
				<div class="col-xs-4 col-md-offset-2 col-md-2">
					<img src="img/howitworks/teachers/message.png">
				</div>
				<div class="col-xs-4 col-md-offset-2 col-md-2">
					<img src="img/howitworks/teachers/learn.png">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<form action="/teachers" method="POST">
						{{ csrf_field() }}
						<div class="form-group row">
							<div class="col-xs-8 col-sm-offset-1 col-sm-7">
								<input type="text" class="form-control" id="indexSearch" name="search" placeholder="Mathematics / Electromagnetics / IITJEE">
								<small class="text-muted hidden-xs-down">You can search for any subject , class , topic or a particular teacher</small>
							</div>
							<div class="col-xs-4 col-sm-3">
								<button type="submit" class="btn btn-primary">Search</button>
							</div>
						</div>
					</form>
				</div>
				@if ((old('search') != null) || (old('search') != ''))
				<div class="col-xs-offset-1 col-xs-11">
					@if ($results !== 0)
					<p>Showing {{ $results }} results for '{{ old('search') }}'</p>
					@else
					<p>
						We're sorry but we couldn't find any results for '{{ old('search') }}'.
						Please try changing your search query to something more relevant.
					</p>
					@endif
				</div>
				@else
				<div class="col-xs-offset-1 col-xs-11">
					<p>Showing {{ $results }} results</p>
				</div>
				@endif
			</div>
			<div class="row">
				<main class="col-xs-12">
					<div class="row">
						@foreach ($teachers as $teacher)
							<div class="col-xs-12 col-md-4 teacher">
								<div class="row">
									<div class="col-xs-4 dp">
										<img src="{{ $teacher->picture }}" class="img-responsive">
									</div>
									<div class="col-xs-8">
										<h4 class="card-title"><a href="profile/{{ $teacher->id }}">{{ ucwords(strtolower($teacher->name)) }}</a><span class="label">GT<?php printf("%04d", $teacher->id); ?></span></h4>
										<small>{{ $teacher->degree }} [ {{ $teacher->college }} ]</small>
										<hr>
										<p>{{ $teacher->introduction }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<p>
											<i class="material-icons md-14">star_border</i> <span>
												@if ($teacher->rating_count == 0)
													Not rated yet
												@else
													{{ $teacher->rating }}
												@endif
											<!-- <small></small>  ₹ {{ $teacher->minfees }}/ per hour --> </span>
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<a href="#" role="button" class="btn btn-dark" data-toggle="modal" data-target="#callModal">
											<i class="material-icons md-18">ring_volume</i>
											<span>Call</span>
										</a>
										<a href="#" role="button" class="btn btn-dark" data-toggle="modal" data-target="#messageModal" data-name="{{ ucwords(strtolower($teacher->name)) }}">
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
        <div class="modal fade" id="callModal" tabindex="-1" role="dialog" aria-labelledby="callModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="container-fluid">
                        <div class="row modal-custom-header">
                            <div class="col-xs-12">
                                <button type="button" class="close" id="callModalDismiss" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
					            <img src="/img/logo.png">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="/teachers/call" method="POST">
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
                                            <label for="phone" class="form-control-label">Phone <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="phone">
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
		<!--
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#enquiryModal">Enquiry</button>
		-->
@endsection
