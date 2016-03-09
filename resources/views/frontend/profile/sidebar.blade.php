<aside class="col-xs-12 col-sm-2">
	<img src="{{ env('TEACHING_LINK') }}{{ $teacher->users->first()->picture }}" class="img-responsive">
	<div class="gutter-sm"></div>
	<h3><a href="/tutor/{{ $teacher->id }}">{{ ucwords(strtolower($teacher->users->first()->name)) }}</a></h3>
	<div class="gutter-sm"></div>
	<ul>
		<li><a href="/tutor/{{ $teacher->id }}/schedule">Schedule</a></li>
		<li><a href="/tutor/{{ $teacher->id }}/topics">Topics</a></li>
	</ul>
</aside>