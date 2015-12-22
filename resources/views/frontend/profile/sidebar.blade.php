<aside class="col-xs-2">
    <img src="img/man.jpg" class="img-responsive">
    <div class="gutter-sm"></div>
    <h3 class="text-center"><a href="/profile">{!! ucfirst($user->name) !!}</a></h3>
    <div class="gutter-sm"></div>
    <div class="list-group">

        <a href="/profile/{{ $user->id }}/class" class="list-group-item">REQUEST CLASS</a>
        <a href="/profile/{{ $user->id }}/schedule" class="list-group-item">Schedule</a>
        <a href="/profile/{{ $user->id }}/subjects" class="list-group-item">Subjects</a>
        <a href="/profile/{{ $user->id }}/reviews" class="list-group-item">Reviews</a>
        
            <a href="/profile/{{ $user->id }}/classes" class="list-group-item">Classes</a>
            <a href="/profile/{{ $user->id }}/messages" class="list-group-item">Messages</a>
            <a href="/profile/{{ $user->id }}/update/personal" class="list-group-item">Update Profile</a>

    </div>
</aside>
