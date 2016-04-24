@extends ('layouts.profile')
@section('main')
<script>
    var topics = <?php echo json_encode($topics); ?>;
    var routeURL = <?php echo json_encode(url('profile/'.$user->id.'/')); ?>;
</script>
					<main class="col-xs-10 class">
						<div class="row">
							<div class="col-xs-12">
								<div class="gutter-sm"></div>
								<form>
									<div class="row">
										<fieldset class="form-group col-xs-3">
											<label for="class">Class</label>
											<select class="form-control form-control-sm c-select" id="class">
												<option selected>CLASS</option>
											</select>
										</fieldset>
										<fieldset class="form-group col-xs-offset-1 col-xs-3">
											<label for="subject">Subject</label>
											<select class="form-control form-control-sm c-select" id="subject">
												<option selected>SUBJECT</option>
											</select>
										</fieldset>
										<fieldset class="form-group col-xs-offset-1 col-xs-3">
											<label for="topic">Topic</label>
											<select class="form-control form-control-sm c-select" id="topic">
												<option selected>TOPIC</option>
											</select>
										</fieldset>
									</div>
									<div class="gutter-sm"></div>
									<div class="row">
										<div class="col-xs-5 ">
											<div class="row">
												<div class="col-xs-2">
													<i class="material-icons md-36">
														<a href="#" class="previous">
															keyboard_arrow_left
														</a>
													</i>
												</div>
												<div class="col-xs-8">
													<h2 class="text-center monthYear" data-month="" data-year="">
													</h2>
												</div>
												<div class="col-xs-2">
													<i class="material-icons md-36 pull-right">
														<a href="#" class="next">
															keyboard_arrow_right
														</a>
													</i>
												</div>
											</div>
											<div class="calendar" id="calendar">
											</div>
										</div>
										<div class="col-xs-offset-1 col-xs-6">
											<div class="timeslot">
											</div>
										</div>
									</div>
									<div class="gutter-sm"></div>
									<div class="row message">
										<div class="col-xs-12">
											<p>Suitable time not available?</p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consequat ultricies urna, ac accumsan nulla tristique sit amet. Mauris lobortis posuere leo, sit amet efficitur turpis efficitur ac. In at tristique ipsum. Sed lobortis odio eget sapien mollis viverra. Nullam semper purus et sapien rhoncus porta.</p>
										</div>
									</div>
									<div class="gutter-md"></div>
									<hr class="purple">
									<h1>Class Details</h1>
									<div class="gutter-sm"></div>
									<div class="row details">
										<div class="col-sm-8">
											<p><b>Subject : </b><span id="bookSubject"></span></p>
											<p><b>Date : </b><span id="bookDate"></span></p>
											<p><b>Time : </b><span id="bookTime"></span></p>
											<p><b>Charges : </b>₹ <span id="bookFees"></span></p>
										</div>
										<div class="col-sm-4">
											<button type="submit" class="btn btn-primary">BOOK</button>
										</div>
									</div>
								</form>
								<div class="gutter-md"></div>
							</div>
						</div>
					</main>
@endsection
