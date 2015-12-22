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
        {!! Form::model(array('url' => '/profile/update/personal', 'method' => 'POST')) !!}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-3">
                    <h5>Gender</h5>
                </div>
                <div class="col-xs-9">
                    <div class="radio">
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="gender" value="male"> Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="gender" value="female"> Female
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
                        <input type="text" name="date_of_birth" class="form-control" value="{{ old('name') }}">
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <h5>Address</h5>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        <input type="text" name="address_city" class="form-control" placeholder="City" value="{{ old('address_city') }}">
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        <input type="text" name="address_state" class="form-control" placeholder="State" value="{{ old('address_state') }}">
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        <input type="text" name="address_pin" class="form-control" placeholder="ZIP Code" value="{{ old('address_pin') }}">
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        <select name="address_country" class="form-control c-select">
                            <option selected>Country</option>
                            <option value="India">India</option>
                            <option value="UAE">UAE</option>
                            <option value="Singapore">Singapore</option>
                        </select>
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
        {!! Form::close() !!}
    </div>
</main>
@endsection