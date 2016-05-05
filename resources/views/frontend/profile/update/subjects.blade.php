@extends ('layouts.profile')
@section('main')

<main class="col-xs-10 signup">
  <div class="gutter-sm"></div>
  <h2>Profile Update</h2>
<!--  <h4 class="pull-right">Profile | 2 of 4 steps completed</h4>  -->
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
      <p class="messages">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
  <div class="signupsubjects">
    <form id="signupsubjects" method="POST" action="{{ url('profile/'.$user->id.'/update/subjects') }}">
      {{ csrf_field() }}
      <div class="gutter-sm"></div>
      @foreach ($subjects as $grade)
      <div class="row">
        <div class="col-xs-12">
          <div class="media">
            <div class="media-left">
              <a href="#">
                <i class="material-icons md-36" data-toggle="collapse" href="#{{$grade['name']}}" aria-expanded="false" aria-controls="{{$grade['name']}}">reorder</i>
              </a>
            </div>
            <div class="media-body grade">
              <div class="row">
                <div class="col-xs-2">
                  <h4 class="media-heading" data-toggle="collapse" href="#{{$grade['name']}}" aria-expanded="false" aria-controls="{{$grade['name']}}">{{$grade['name']}}</h4>
                </div>
                <div class="col-xs-2">
                  <select name="price[{{$grade['name']}}]" class="form-control c-select">
                    <option value="500">500</option>
                    <option value="700">700</option>
                    <option value="1000">1000</option>
                  </select>
                </div>
              </div>
              <div id="{{$grade['name']}}" class="collapse subjects-grade">
                @foreach ($grade['subjects'] as $subject)
                <div class="media full-width">
                  <a class="media-left" href="#">
                    <i class="material-icons md-36" data-toggle="collapse" href="#{{$grade['name']}}{{$subject['name']}}" aria-expanded="false" aria-controls="{{$grade['name']}}{{$subject['name']}}"> reorder </i>
                  </a>
                  <div class="media-body">
                    <h4 class="media-heading" data-toggle="collapse" href="#{{$grade['name']}}{{$subject['name']}}" aria-expanded="false" aria-controls="{{$grade['name']}}{{$subject['name']}}">{{$subject['name']}}</h4>
                    <div class="collapse" id="{{$grade['name']}}{{$subject['name']}}">
                      <div class="subject full-width">
                        @foreach ($subject['topics'] as $topic)
                        <input
                          hidden
                          type="checkbox"
                          id="{{$grade['name']}}{{$topic['name']}}{{$subject['name']}}"
                          name="subject[{{$grade['name']}}][]"
                          value="{{$topic['id']}}"
                          <?php if(in_array($topic['id'],$teacherTopics)) echo "checked"; ?>
                        >
                        <label for="{{$grade['name']}}{{$topic['name']}}{{$subject['name']}}">{{$topic['name']}}</label>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="gutter-sm"></div>
      @endforeach
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
