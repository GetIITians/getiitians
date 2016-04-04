@extends ('layouts.profile')
@section('main')
<main class="col-xs-10 signup">
    <div class="gutter-sm"></div>
    <h2>Teacher Signup</h2>
    <h4 class="pull-right">Profile | 0 of 4 steps completed</h4>
    <div class="gutter-sm"></div>
    <div class="row sections">
        <div class="col-xs-2">
            <a href="personal"><span>1</span>PERSONAL</a>
        </div>
        <div class="col-xs-offset-1 col-xs-2">
            <a href="qualification"><span>2</span>QUALIFICATION</a>
        </div>
        <div class="col-xs-offset-1 col-xs-2">
            <a href="subjects"><span>3</span>SUBJECTS</a>
        </div>
        <div class="col-xs-offset-1 col-xs-2">
            <a href="calendar"><span>4</span>CALENDAR</a>
        </div>
    </div>
    <div class="gutter-sm"></div>
    <div class="signuppersonal">
        <div class="row" id="profile-pic">
          <div class="col-xs-3">
            <h5>Profile Picture</h5>
          </div>
          <div class="col-xs-5">
            <form action="{{ url('/profile/'.$user->id.'/update/personal/picture') }}" class="dropzone" id="dp-upload">
              {{ csrf_field() }}
            </form>
          </div>
        </div>
        {!! Form::model($user, array('url' => '/profile/'.$user->id.'/update/personal', 'method' => 'POST')) !!}
            {{ csrf_field() }}
            <div class="row">
              <div class="col-xs-3">
                <h5>Name</h5>
              </div>
              <div class="col-xs-2">
                <fieldset class="form-group">
                  {!! Form::text('name', null,['class' => 'form-control']) !!}
                </fieldset>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                <h5>Mobile Number</h5>
              </div>
              <div class="col-xs-2">
                <fieldset class="form-group">
                  {!! Form::text('phone', null,['class' => 'form-control']) !!}
                </fieldset>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                <h5>Email ID</h5>
              </div>
              <div class="col-xs-2">
                <fieldset class="form-group">
                  {!! Form::text('email', null,['class' => 'form-control']) !!}
                </fieldset>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                <h5>Profile Picture</h5>
              </div>
              <div class="col-xs-6">
                <fieldset class="form-group" id="file-upload">
                  {!! Form::file('picture', ['class' => 'form-control']) !!}
                </fieldset>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                <h5>Introduction</h5>
              </div>
              <div class="col-xs-6">
                <fieldset class="form-group">
                  {!! Form::textarea('introduction', null,['class' => 'form-control', 'rows' => '4']) !!}
                </fieldset>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                <h5>Gender</h5>
              </div>
              <div class="col-xs-9">
                <div class="radio">
                  <label class="radio-inline">
                    {!! Form::radio('gender', 'male') !!} Male
                  </label>
                  <label class="radio-inline">
                    {!! Form::radio('gender', 'female') !!} Female
                  </label>
                </div>
              </div>
            </div>
            <div class="gutter-xs"></div>
            <div class="row dob">
                <div class="col-xs-3">
                    <h5>Date of Birth</h5>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        {!! Form::text('date_of_birth', $user->date_of_birth->format('d/m/Y'),['class' => 'form-control', 'placeholder' => 'dd/MM/YYYY']) !!}
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <h5>Address</h5>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        {!! Form::text('city', null,['class' => 'form-control']) !!}
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        {!! Form::text('state', null,['class' => 'form-control']) !!}
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        {!! Form::text('pin', null,['class' => 'form-control']) !!}
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        {!! Form::select('country', ['' => 'Country', 'India' => 'India', 'UAE' => 'UAE', 'Singapore' => 'Singapore'], null, ['class' => 'form-control c-select']) !!}
                    </fieldset>
                </div>
            </div>
            <div class="gutter-sm"></div>
            <div class="row">
                <div class="col-xs-2">
                    {!! Form::submit('SAVE', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        <div class="gutter-sm"></div>
    </div>
</main>

<script src="/js/vendor/dropzone.js"></script>
<script type="text/javascript">
  Dropzone.options.dpUpload = {
    paramName: "picture", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
  };
</script>
@endsection
