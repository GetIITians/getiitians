@extends ('layouts.profile')
@section('main')
<main class="col-xs-12 col-sm-10">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<p class="text-justify">{{ $user->introduction }}</p>
			<hr>
      @if ($user->isTeacher())
			<div class="row">
				<div class="col-xs-12 col-sm-4">
          @if (!$user->deriveable->qualifications->isEmpty())
					<p>
						<i class="material-icons md-18">school</i>
						<span class="pull-right" data-toggle="tooltip" title="Educational Qualifications">{{ $user->deriveable->qualifications->first()->degree }} from {{ $user->deriveable->qualifications->first()->college }}</span>
					</p>
          @endif
          @if (!$user->deriveable->languages->isEmpty())
					<p>
						<i class="material-icons md-18">language</i>
						<span class="pull-right" data-toggle="tooltip" title="Teaching medium languages">
							@foreach ($user->deriveable->languages as $language)
								{{ $language->language }},
							@endforeach
						</span>
					</p>
          @endif
				</div>
				<div class="col-xs-12 col-sm-offset-6 col-sm-2">
          @if(!is_null($user->gender))
					<p>
						<i class="material-icons md-18">perm_identity</i>
						<span class="pull-right">{{ ucfirst($user->gender) }}</span>
					</p>
          @endif
					<p>
						<i class="material-icons md-18">star_rate</i>
						@if ($user->deriveable->rating_count === 0)
							<span class="pull-right">Not rated yet</span>
						@else
							<span class="pull-right">
								{{ (float)$user->deriveable->rating }}
							</span>
						@endif
					</p>
				</div>
			</div>
    @endif
		</div>
		<div class="col-xs-12 col-sm-4">
      @if ($user->isTeacher())
				@if(!Auth::check())
					<form id="messageTeacher" class="loggedOutMessage" action="/teachers/message" method="POST">
						{{ csrf_field() }}
						<p>Send {{ ucwords(strtolower($user->name)) }} a message explaining your needs and you will recieve a response by email.</p>
						<input type="hidden" id="recipient" value="{{ ucwords(strtolower($user->name)) }}">
						<fieldset class="form-group">
							<textarea class="form-control" id="message" rows="5" placeholder="Write your message here."></textarea>
						</fieldset>
						<small>The message to be sent can't be empty</small>
						<button type="submit" class="btn btn-primary-reverse">MESSAGE {{ strtoupper($user->name) }}</button>
					</form>
				@elseif(!$user->ownProfile() AND Auth::user()->isStudent())
				<form  id="messageTeacher" action="{{ url('profile/'.$user->id.'/message/') }}" method="POST">
					{{ csrf_field() }}
					<p>Contact {{ ucwords(strtolower($user->name)) }} to ask a doubt or setup a special class.</p>
					<input type="hidden" name="teacher_id" value="{{ $user->id }}">
					<input type="hidden" name="student_id" value="{{ Auth::user()->deriveable->id }}">
					<fieldset class="form-group">
						<textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here."></textarea>
					</fieldset>
					<small></small>
					<button type="submit" class="btn btn-primary-reverse">MESSAGE {{ strtoupper($user->name) }}</button>
				</form>
				@endif
    	@endif
		</div>
	</div>
	<div class="gutter-sm"></div>
    @if ($user->isTeacher())
	<div class="row">
		<div class="col-xs-12">
			<h3>Topics</h3>
			<hr>
			<?php
				$i = 0 ;
				echo "<ul class='profileTopics'>";
				foreach($user->deriveable->topics as $topic) {
					$i++;
					echo "<li>".$topic->name."</li>";
					if($i>19) break;
					if($i%5===0){echo "</ul><ul class='profileTopics'>";}
				}
				echo "</ul><br>";
			?>
			<small><a href="{{ $user->id }}/topics">View All</a></small>
		</div>
	</div>
    @endif
    <div class="gutter-sm"></div>
</main>

@endsection
