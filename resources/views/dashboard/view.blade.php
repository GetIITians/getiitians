@extends ('layouts.dashboard')
@section('main')
<main class="col-xs-12 col-sm-10" id="adminTeachers">
  <div class="gutter-sm"></div>
    <div class="row">
      <div class="col-xs-2">
          <h5><i>Status</i></h5>
      </div>
      <div class="col-xs-9">
        <h5><?php echo ($teacher->display === 1) ? "Accepted" : "Rejected" ; ?></h5>
      </div>
    </div>
    <hr>
    <h5><i>Personal</i></h5>
    <hr>
    <div class="row">
      <div class="col-xs-2">
          <p>Name</p>
      </div>
      <div class="col-xs-9">
        <p>{{$user->name}}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2">
          <p>Phone</p>
      </div>
      <div class="col-xs-9">
        <p>{{$user->phone}}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2">
          <p>Email</p>
      </div>
      <div class="col-xs-9">
        <p>{{$user->email}}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2">
          <p>Introduction</p>
      </div>
      <div class="col-xs-9">
        <p>{{$user->introduction}}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2">
          <p>Gender</p>
      </div>
      <div class="col-xs-9">
        <p>{{$user->gender}}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2">
          <p>Date of Birth</p>
      </div>
      <div class="col-xs-9">
        <p>{{$user->date_of_birth->toFormattedDateString()}}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2">
          <p>Age</p>
      </div>
      <div class="col-xs-9">
        <p>{{$user->date_of_birth->age}} years</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2">
          <p>Address</p>
      </div>
      <div class="col-xs-9">
        <p>{{$user->house}} {{$user->street}} {{$user->city}} {{$user->state}} {{$user->country}} - {{$user->pin}}</p>
      </div>
    </div>
    <div class="gutter-sm"></div>
    <h5><i>Professional</i></h5>
    <hr>
    <div class="row">
      <div class="col-xs-2">
          <p>Experience</p>
      </div>
      <div class="col-xs-9">
        <p>{{$teacher->experience}} years</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2">
          <p>Resume</p>
      </div>
      <div class="col-xs-9">
        <p><a href="{!! asset($teacher->resume) !!}">Resume</a></p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2">
          <p>Home Tuition</p>
      </div>
      <div class="col-xs-9">
        <p><?php echo ($teacher->home_tuition === 1) ? "Yes" : "No" ; ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2">
          <p>Languages</p>
      </div>
      <div class="col-xs-9">
          <ol>
              @foreach($teacher->languages as $language)
                  <li>{{$language->language}}</li>
              @endforeach
          </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2">
          <p>Qualifications</p>
      </div>
      <div class="col-xs-9">
          <ol>
              @foreach($teacher->qualifications as $qualification)
                  <li>
                      <div class="row">
                          <div class="col-xs-2">College</div>
                          <div class="col-xs-10">{{ $qualification->college }}</div>
                      </div>
                      <div class="row">
                          <div class="col-xs-2">Degree</div>
                          <div class="col-xs-10">{{ $qualification->degree }}</div>
                      </div>
                      <div class="row">
                          <div class="col-xs-2">Branch</div>
                          <div class="col-xs-10">{{ $qualification->branch }}</div>
                      </div>
                      <div class="row">
                          <div class="col-xs-2">Passout year</div>
                          <div class="col-xs-10">{{ $qualification->passout->toFormattedDateString() }}</div>
                      </div>
                      <div class="row">
                          <div class="col-xs-2">Verficiation</div>
                          <div class="col-xs-10"><a href="{!! asset($qualification->verification) !!}">Degree verification</a></div>
                      </div>
                      <div class="gutter-xs"></div>
                  </li>
              @endforeach
          </ol>
      </div>
    </div>
</main>
@endsection
