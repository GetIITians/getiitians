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
        {!! Form::model($user, array('url' => '/profile/'.$user->id.'/update/personal', 'method' => 'POST')) !!}
            {{ csrf_field() }}
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
                        {!! Form::text('date_of_birth', null,['class' => 'form-control', 'placeholder' => 'yyyy-mm-dd']) !!}
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <h5>Address</h5>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        {!! Form::text('address_city', null,['class' => 'form-control', 'placeholder' => 'City']) !!}
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        {!! Form::text('address_state', null,['class' => 'form-control', 'placeholder' => 'State']) !!}
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        {!! Form::text('address_pin', null,['class' => 'form-control', 'placeholder' => 'ZIP Code']) !!}
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        {!! Form::select('address_country', ['' => 'Country', 'India' => 'India', 'UAE' => 'UAE', 'Singapore' => 'Singapore'], null, ['class' => 'form-control c-select']) !!}
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
        <hr>
        <div class="gutter-sm"></div>
        {!! Form::model($info, array('url' => '/profile/'.$user->id.'/update/info', 'method' => 'POST')) !!}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-3">
                    <h5>Are you Ok with Home Tuition?</h5>
                </div>
                <div class="col-xs-9">
                    <div class="radio">
                        <label class="radio-inline">
                            {!! Form::radio('home_tuition', 'yes') !!} yes
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('home_tuition', 'no') !!} no
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <h5>Languages</h5>
                </div>
                <div class="col-xs-3">
                    <div class="c-inputs-stacked">
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="English">
                            <span class="c-indicator"></span>
                            English
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Hindi">
                            <span class="c-indicator"></span>
                            Hindi
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Assamese">
                            <span class="c-indicator"></span>
                            Assamese
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Sanskrit">
                            <span class="c-indicator"></span>
                            Sanskrit
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Bengali">
                            <span class="c-indicator"></span>
                            Bengali
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Malyalam">
                            <span class="c-indicator"></span>
                            Malyalam
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Tamil">
                            <span class="c-indicator"></span>
                            Tamil
                        </label>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="c-inputs-stacked">
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Gujarati">
                            <span class="c-indicator"></span>
                            Gujarati
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Marathi">
                            <span class="c-indicator"></span>
                            Marathi
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Telugu">
                            <span class="c-indicator"></span>
                            Telugu
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Oriya">
                            <span class="c-indicator"></span>
                            Oriya
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Urdu">
                            <span class="c-indicator"></span>
                            Urdu
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Kannada">
                            <span class="c-indicator"></span>
                            Kannada
                        </label>
                        <label class="c-input c-checkbox">
                            <input id="radioStacked1" name="lanugage[]" type="checkbox" value="Punjabi">
                            <span class="c-indicator"></span>
                            Punjabi
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <h5>Experience</h5>
                </div>
                <div class="col-xs-3">
                    <fieldset class="form-group">
                        {!! Form::select('experience', ['0' => 'None', '1' => '1 yr', '2' => '2 yr', '3' => '3 yr'], null, ['class' => 'form-control c-select']) !!}
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <h5>Resume</h5>
                </div>
                <div class="col-xs-3">
                    <fieldset class="form-group">
                        {!! Form::file('resume', ['class' => 'form-control']) !!}
                    </fieldset>
                </div>
            </div>
            <div class="gutter-sm"></div>
            <div class="row">
                <div class="col-xs-2">
                    {!! Form::submit('SAVE', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            <div class="gutter-md"></div>
        {!! Form::close() !!}
    </div>
</main>
@endsection