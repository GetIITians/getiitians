@extends ('layouts.profile')
@section('main')
    <main class="col-xs-10 signup">
      <div class="gutter-sm"></div>
      <h2>Profile Update</h2>
<!--      <h4 class="pull-right">Profile | 1 of 4 steps completed</h4>  -->
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
        <div class="signupqualification">
          <?php $teacher = $user->deriveable; ?>
          {!! Form::model($teacher, array('url' => '/profile/'.$user->id.'/update/qualification', 'method' => 'POST', 'files' => true)) !!}
              <div class="row">
                <div class="col-xs-6">
                  <?php $i = 0; ?>
                  @foreach ($teacher->qualifications as $qualification)
                  <div class="row">
                    <div class="col-xs-12">
                      <?php echo Form::hidden('qualification['.$i.'][id]',$qualification->id) ?>
                      <div class="row">
                        <div class="col-xs-4">
                          <h5>College</h5>
                        </div>
                        <div class="col-xs-6">
                          <fieldset class="form-group">
                            <?php echo Form::select('qualification['.$i.'][college]', ['' => 'Select a college', 'IIT Roorkee' => 'IIT Roorkee', 'IIT Delhi' => 'IIT Delhi', 'IIT Madras' => 'IIT Madras'], $qualification->college, ['class' => 'form-control c-select']); ?>
                          </fieldset>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-4">
                          <h5>Degree</h5>
                        </div>
                        <div class="col-xs-6">
                          <fieldset class="form-group">
                            <?php echo Form::select('qualification['.$i.'][degree]', ['' => 'Select a degree', 'B.Tech.' => 'B.Tech.', 'M.Tech.' => 'M.Tech.', 'Dual Degree' => 'Dual Degree'], $qualification->degree, ['class' => 'form-control c-select']); ?>
                          </fieldset>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-4">
                          <h5>Branch</h5>
                        </div>
                        <div class="col-xs-6">
                          <fieldset class="form-group">
                            <?php echo Form::text('qualification['.$i.'][branch]', $qualification->branch,['class' => 'form-control']); ?>
                          </fieldset>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-4">
                          <h5>Year of Passout</h5>
                        </div>
                        <div class="col-xs-6">
                          <fieldset class="form-group">
                            <?php echo Form::text('qualification['.$i.'][passout]', $qualification->passout->format('d/m/Y'), ['class' => 'form-control']); ?>
                          </fieldset>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-4">
                          <h5>College Verification</h5>
                        </div>
                        <div class="col-xs-6">
                          <fieldset class="form-group">
                            <?php echo Form::file('qualification['.$i.'][verification]', ['class' => 'form-control']); ?>
                          </fieldset>
                        </div>
                      </div>
                      <hr>
                    </div>
                  </div>
                  <?php $i++; ?>
                  @endforeach
                  <div class="row addanothercollege" id="#addanothercollege">
                    <div class="col-xs-4">
                      <a class="btn btn-primary add">Add another college</a>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="row">
                    <div class="col-xs-4">
                      <h5>Experience</h5>
                    </div>
                    <div class="col-xs-6">
                      <fieldset class="form-group">
                        {!! Form::select('experience', [0 => '0', 1 => '1 year', 2 => '2 years', 3 => '3 years', 4 => '4 years', 5 => '5 years', 6 => '6 years', 7 => '7 years', 8 => '8 years', 9 => '9 years', 10 => '10 years', 11 => '11 years', 12 => '12 years', 13 => '13 years', 14 => '14 years', 15 => '15 years'], null, ['class' => 'form-control c-select']) !!}
                      </fieldset>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-4">
                      <h5>Resume</h5>
                    </div>
                    <div class="col-xs-6">
                      <fieldset class="form-group">
                        {!! Form::file('resume', ['class' => 'form-control']) !!}
                      </fieldset>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-4">
                      <h5>Are you OK with Home Tuition ?</h5>
                    </div>
                    <div class="col-xs-6">
                      <div class="radio">
                        <label class="radio-inline">
                          {!! Form::radio('home_tuition', 1, null, (($teacher->home_tuition===1) ? ['checked' => ''] : '' )) !!}  yes
                        </label>
                        <label class="radio-inline">
                          {!! Form::radio('home_tuition', 0, null, (($teacher->home_tuition===0) ? ['checked' => ''] : '' )) !!} no
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-4">
                      <h5>Languages</h5>
                    </div>
                    <div class="col-xs-4">
                      <div class="c-inputs-stacked">
                        @for ($i = 1; $i < 8; $i++)
                          <label class="c-input c-checkbox">
                            <input name="language[]" type="checkbox" value="{{ $i }}" {{ (in_array($languages[$i],$teacher->languages->lists('language')->toArray())) ? "checked" : "" }}>
                            <span class="c-indicator"></span>
                            {{ $languages[$i] }}
                          </label>
                        @endfor
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="c-inputs-stacked">
                        @for ($i = 8; $i < 15; $i++)
                          <label class="c-input c-checkbox">
                            <input name="language[]" type="checkbox" value="{{ $i }}" {{ (in_array($languages[$i],$teacher->languages->lists('language')->toArray())) ? "checked" : "" }}>
                            <span class="c-indicator"></span>
                            {{ $languages[$i] }}
                          </label>
                        @endfor
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="gutter-md"></div>
              <div class="gutter-md"></div>
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
