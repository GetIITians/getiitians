<aside class="col-xs-12 col-sm-2">
	<img src="{{ env('TEACHING_LINK') }}{{ $teacher->users->first()->picture }}" class="img-responsive">
	<div class="gutter-sm"></div>
	<h3><a href="/teacher/{{ $teacher->id }}">{{ ucwords(strtolower($teacher->users->first()->name)) }}</a></h3>
	<div class="gutter-sm"></div>
	<ul>
		<li><a href="/teacher/{{ $teacher->id }}/schedule">Schedule</a></li>
		<li><a href="/teacher/{{ $teacher->id }}/topics">Topics</a></li>
	</ul>
</aside>