@extends ('layouts.profile')
@section('main')

<main class="col-xs-10 signup">
  <div class="gutter-sm"></div>
  <h2>Profile Update</h2>
<!--  <h4 class="pull-right">Profile | 3 of 4 steps completed</h4>  -->
  <div class="gutter-sm"></div>
  <div class="row sections">
    <div class="col-xs-2">
      <a href="/profile/{{ $user->id }}/update/personal"><span>1</span>PERSONAL</a>
    </div>
    <div class="col-xs-offset-1 col-xs-2">
      <a href="/profile/{{ $user->id }}/update/qualification"><span>2</span>QUALIFICATION</a>
    </div>
    <div class="col-xs-offset-1 col-xs-2">
      <a href="/profile/{{ $user->id }}/update/subjects"><span>3</span>SUBJECTS</a>
    </div>
    <div class="col-xs-offset-1 col-xs-2">
      <a href="/profile/{{ $user->id }}/update/timeslots"><span>4</span>CALENDAR</a>
    </div>
  </div>
  <div class="gutter-sm"></div>
  <div class="row">
    <div class="col-xs-12">
      <ol class="how-to-use">
        <li><small>If no timeslot is selected while saving your calendar, all the timeslots previously added in date range will be removed [Except if a class has been booked for any of them].</small></li>
        <li><small>If no days are selected, timeslots will be added for all days of the week.</small></li>
      </ol>
    </div>
  </div>
  <div class="signupcalendar">
    <form id="signupcalendar" method="POST" action="{{ url('profile/'.$user->id.'/update/timeslots') }}">
      {{ csrf_field() }}
      <div class="timeslot">
        @for ($i = 0; $i < 48; $i++)
          <input hidden type="checkbox" id="{{ $i }}" name="time[]" value="{{ $i }}">
          <label class="time" for="{{ $i }}">{{ config('constant.timeslots')[$i] }}</label>
        @endfor
      </div>
      <div class="gutter-sm"></div>
      <div class="days">
        @for ($i = 1; $i < 8; $i++)
          <input hidden type="checkbox" id="{{ config('constant.days')[$i] }}" name="days[]" value="{!! ($i==7) ? 0 : $i ; !!}">
          <label class="day" for="{{ config('constant.days')[$i] }}">{{ ucfirst(config('constant.days')[$i]) }}</label>
        @endfor
      </div>
      <div class="gutter-sm"></div>
      <div class="row dates">
        <div class="col-xs-2">
          <h4>Start Date</h4>
        </div>
        <div class="col-xs-3">
          <fieldset class="form-group">
            <div class="input-group date" id="start-date">
              <input type="text" class="form-control" placeholder="" name="start">
              <div class="input-group-addon">
                <i class="material-icons md-18">apps</i>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-xs-offset-2 col-xs-2">
          <h4>End Date</h4>
        </div>
        <div class="col-xs-3">
          <fieldset class="form-group">
            <div class="input-group date" id="end-date">
              <input type="text" class="form-control" placeholder="" name="end">
              <div class="input-group-addon">
                <i class="material-icons md-18">apps</i>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
      <div class="gutter-sm"></div>
      <div class="row">
        <div class="col-xs-2">
          <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
      </div>
      <div class="gutter-md"></div>
    </form>
  </div>
</main>
@endsection
