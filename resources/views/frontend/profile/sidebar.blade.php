<aside class="col-xs-12 col-sm-2">
	<img src="{{ env('TEACHING_LINK') }}{{ $teacher->users->first()->picture }}" class="img-responsive">
	<div class="gutter-sm"></div>
	<h3><a href="/tutor/{{ $teacher->id }}">Himanshu Jain</a></h3>
	<div class="gutter-sm"></div>
	<ul>
		<li><a href="{{ $teacher->id }}/class">REQUEST CLASS</a></li>
		<li><a href="{{ $teacher->id }}/schedule">Schedule</a></li>
		<li><a href="{{ $teacher->id }}/topics">Topics</a></li>
		<li><a href="{{ $teacher->id }}/reviews">Reviews</a></li>
		<li><a href="{{ $teacher->id }}/classes">Classes</a></li>
		<li><a href="{{ $teacher->id }}/messages">Messages</a></li>
		<li><a href="{{ $teacher->id }}/account">Account</a></li>
		<li><a href="{{ $teacher->id }}/signuppersonal">Update Profile</a></li>
	</ul>
</aside>