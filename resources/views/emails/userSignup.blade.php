<p>A new {!! ucfirst($user->typeOfUser()) !!} has signed up.</p>
<p>Name  : {{ $user->name }}</p>
<p>Email : {{ $user->email }}</p>
<br>
@if($user->isTeacher())
<p>Please review the Teacher's profile.</p>
@endif