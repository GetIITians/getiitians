@extends ('layouts.profile')
@section('main')
<main class="col-xs-12 col-sm-10">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<p class="text-justify">{{ $teacher->users->first()->introduction }}</p>
			<hr>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<p>
						<i class="material-icons md-18">school</i>
						<span class="pull-right" data-toggle="tooltip" title="Educational Qualifications">{{ $teacher->qualifications->first()->degree }} from {{ $teacher->qualifications->first()->college }}</span>
					</p>
					<p>
						<i class="material-icons md-18">language</i>
						<span class="pull-right" data-toggle="tooltip" title="Teaching medium languages">
							@foreach ($teacher->languages as $language)
								{{ $language->language }},
							@endforeach
						</span>
					</p>
					<p>
						<i class="material-icons md-18">attach_money</i>
						<span class="pull-right" data-toggle="tooltip" title="Teaching fees range">{{ $teacher->minfees }} / per hour</span>
					</p>
					<!--
					<p>
						<i class="material-icons md-18">account_balance</i>
						<span class="pull-right" data-toggle="tooltip" title="Money earned from getIITians"><a href="account.html">₹ 5,400</a></span>
					</p>
					-->
				</div>
				<div class="col-xs-12 col-sm-6">
					<p>
						<i class="material-icons md-18">perm_identity</i>
						<span class="pull-right">{{ ucfirst($teacher->users->first()->gender) }}</span>
					</p>
					<p>
						<i class="material-icons md-18">star_rate</i>
						@if ($teacher->rating_count === 0)
							<span class="pull-right">4.8</span>
						@else
							<span class="pull-right">
								{{ (float)$teacher->rating }}
							</span>
						@endif
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="gutter-sm"></div>
	<div class="row">
		<div class="col-xs-12">
			<h3>Topics</h3>
			<hr>
			<p class="text-justify">
			<?php
				$i = 0;
				foreach($teacher->topics as $topic) {
					$i++;
					echo $topic->name.", ";
					if($i>20) break;
				}
				echo ".....";
			?>
			</p>
			<small><a href="{{ $teacher->id }}/topics">View All</a></small>
		</div>
	</div>
	<div class="gutter-sm"></div>
	<!--
	<div class="row">
		<div class="col-xs-12">
			<h3>Students Feedback</h3>
			<hr>
			<div class="media">
				<div class="media-left">
					<i class="material-icons md-60">format_quote</i>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Knowledgable &amp; patient tutor -</h4>
					<i>Gaurav jain, Guwahati on 21/8/2015</i>
					<div class="clearfix"></div>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consequat ultricies urna, ac accumsan nulla tristique sit amet. Mauris lobortis posuere leo, sit amet efficitur turpis efficitur ac. In at tristique ipsum. Sed lobortis odio eget sapien mollis viverra. Nullam semper purus et sapien rhoncus porta.
				</div>
			</div>
			<small><a href="reviews.html">View All</a></small>
		</div>
	</div>
	-->
	<div class="gutter-sm"></div>
</main>
@endsection