@extends ('layouts.profile')
@section('main')
    <main class="col-xs-10 signup">
        <div class="gutter-sm"></div>
        <h2>Teacher Signup</h2>
        <h4 class="pull-right">Profile | 1 of 4 steps completed</h4>
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
        <div class="signupqualification">
            {!! $teacher = \App\Info::where('info.user_id',$user->id)
                ->leftJoin('qualifications', 'qualifications.user_id', '=', 'info.user_id')
                ->first(); !!}
            {!! Form::model($teacher, array('url' => '/profile/'.$user->id.'/update/qualifications', 'method' => 'POST', 'files' => true)) !!}
                <div class="row">
                    <div class="col-xs-2">
                        <h5>College 1</h5>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <fieldset class="form-group">
                            {!! Form::select('college[]', ['' => 'College', 'IIT Delhi' => 'IIT Delhi', 'IIT Roorkee' => 'IIT Roorkee', 'IIT Madras' => 'IIT Madras'], null, ['class' => 'form-control c-select']) !!}
                        </fieldset>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <h5>College 2</h5>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <fieldset class="form-group">
                            {!! Form::select('college[]', ['' => 'College', 'IIM Delhi' => 'IIM Delhi', 'IIM Roorkee' => 'IIM Roorkee', 'IIM Madras' => 'IIM Madras'], null, ['class' => 'form-control c-select']) !!}
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <h5>Degree</h5>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <fieldset class="form-group">
                            {!! Form::select('degree[]', ['' => 'Degree', 'B.Tech' => 'B.Tech', 'M.Tech' => 'M.Tech', 'Dual Degree' => 'Dual Degree'], null, ['class' => 'form-control c-select']) !!}
                        </fieldset>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <h5>Degree</h5>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <fieldset class="form-group">
                            {!! Form::select('degree[]', ['' => 'Degree', 'B.Tech' => 'B.Tech', 'M.Tech' => 'M.Tech', 'Dual Degree' => 'Dual Degree'], null, ['class' => 'form-control c-select']) !!}
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <h5>Branch</h5>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <fieldset class="form-group">
                            {!! Form::text('branch[]', null,['class' => 'form-control']) !!}
                        </fieldset>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <h5>Branch</h5>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <fieldset class="form-group">
                            {!! Form::text('branch[]', null,['class' => 'form-control']) !!}
                        </fieldset>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-xs-2">
                        <h5>College Verification</h5>
                    </div>
                    <div class="col-xs-3">
                        <fieldset class="form-group">
                            {!! Form::file('verification[]', ['class' => 'form-control']) !!}
                        </fieldset>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <h5>College Verification</h5>
                    </div>
                    <div class="col-xs-3">
                        <fieldset class="form-group">
                            {!! Form::file('verification[]', ['class' => 'form-control']) !!}
                        </fieldset>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row addanothercollege" id="#addanothercollege">
                    <div class="col-xs-2">
                        <a class="btn btn-primary add">Add another college</a>
                    </div>
                    <div class="col-xs-offset-1 col-xs-2">
                        <a class="btn btn-primary remove hide">Remove added college</a>
                    </div>
                </div>
                <div class="gutter-sm"></div>
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