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
        <form>
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
                        <input type="text" class="form-control">
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <h5>Address</h5>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        <input type="text" class="form-control" placeholder="City">
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        <input type="text" class="form-control" placeholder="State">
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        <input type="text" class="form-control" placeholder="ZIP Code">
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        <select class="form-control c-select">
                            <option selected>Country</option>
                            <option value="1">India</option>
                            <option value="2">UAE</option>
                            <option value="3">Singapore</option>
                        </select>
                    </fieldset>
                </div>
            </div>
            <div class="gutter-sm"></div>
            <div class="row">
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
                <div class="col-xs-offset-1 col-xs-2">
                    <button type="submit" class="btn btn-primary">SKIP FOR NOW</button>
                </div>
            </div>
            <div class="gutter-md"></div>
        </form>
    </div>
</main>
@endsection