@extends ('layouts.profile')
@section('main')
<main class="col-xs-12 col-sm-10 subjects">
	<div class="row">
		<div class="col-xs-12">
			@foreach($topics as $grade => $subjects)
			<div class="media">
				<div class="media-left">
					<a href="#">
						<i class="material-icons md-36" data-toggle="collapse" href="#{{ $grade }}" aria-expanded="false" aria-controls="{{ $grade }}"> keyboard_arrow_down </i>
					</a>
				</div>
				<div class="media-body">
					<h4 class="media-heading">{{ $grade }}</h4>
					<div id="{{ $grade }}" class="collapse">
						@foreach($subjects as $subject => $topics)
						<div class="media">
							<a class="media-left" href="#">
								<i class="material-icons md-36" data-toggle="collapse" href="#{{ $grade }}{{ $subject }}" aria-expanded="false" aria-controls="{{ $grade }}{{ $subject }}"> keyboard_arrow_down </i>
							</a>
							<div class="media-body">
								<h4 class="media-heading" data-toggle="collapse" href="#{{ $grade }}{{ $subject }}" aria-expanded="false" aria-controls="{{ $grade }}{{ $subject }}">{{ $subject }}</h4>
								<div class="media collapse" id="{{ $grade }}{{ $subject }}">
									<div class="media-body">

										<table>
											<tbody>
												<?php
													$i = 1;
													echo "<tr>"; 
													foreach ($topics as $topic) {
														echo $topic;
														if($i % 3 == 0) {echo '</tr><tr>';}
														$i++;
													}
												?>
<!--
												<tr>
													<td>Lorem Ipsum</td>
													<td>Dolor Sit</td>
													<td>Amet</td>
												</tr>
												<tr>
													<td>Lorem Ipsum</td>
													<td>Amet</td>
													<td>Dolor Sit</td>
												</tr>
												<tr>
													<td>Amet</td>
													<td>Lorem Ipsum</td>
													<td>Dolor Sit</td>
												</tr>
												<tr>
													<td>Dolor Sit</td>
													<td>Amet</td>
													<td>Lorem Ipsum</td>
												</tr>
-->
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</main>
@endsection