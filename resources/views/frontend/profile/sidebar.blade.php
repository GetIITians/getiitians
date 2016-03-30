<aside class="col-xs-12 col-sm-2">
	<img src="{!! asset($user->picture) !!}" class="img-responsive">
	<div class="gutter-sm"></div>
	<h3><a href="/profile/{{ $user->id }}">{{ ucwords(strtolower($user->name)) }}</a></h3>
	<div class="gutter-sm"></div>
	<ul>
		@if ($user->isTeacher())
		<li><a href="/profile/{{ $user->id }}/schedule/{{ date('n') }}">Schedule</a></li>
		<li><a href="/profile/{{ $user->id }}/topics">Topics</a></li>
		@endif
		@if ($user->ownProfile())
		<li><a href="/profile/{{ $user->id }}/update/personal">Update</a></li>
		@endif
	</ul>
</aside>
