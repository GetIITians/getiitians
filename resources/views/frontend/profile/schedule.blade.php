@extends ('layouts.profile')
@section('main')

<main class="col-xs-12 col-sm-10 schedule">
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-2">
					<i class="material-icons md-48">
						<a href="{{ ($month-1) }}">
							keyboard_arrow_left
						</a>
					</i>
				</div>
				<div class="col-xs-8">
					<h2 class="text-center">
						{{ date('F', mktime(0, 0, 0, $month, 10)) }} {{ $year }}
					</h2>
				</div>
				<div class="col-xs-2">
					<i class="material-icons md-48 pull-right">
						<a href="{{ ($month+1) }}">
							keyboard_arrow_right
						</a>
					</i>
				</div>
			</div>
			{!! draw_calendar($month,$year,$user->deriveable->timeslots) !!}
			<div class="gutter-md"></div>
		</div>
	</div>
</main>

@endsection