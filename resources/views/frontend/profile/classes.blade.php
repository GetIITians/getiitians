@extends ('layouts.profile')
@section('main')
<main class="col-xs-12 col-sm-10 classes">
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a href="#upcoming" class="nav-link active" role="tab" data-toggle="tab">Upcoming</a>
    </li>
    <li class="nav-item">
      <a href="#previous" class="nav-link" role="tab" data-toggle="tab">Previous</a>
    </li>
  </ul>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="upcoming">
      @if(!empty($sessions))
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Topic</th>
            <th>Date</th>
            <th>Time</th>
            <th>Duration</th>
            @if($user->isTeacher())
              <th>Student</th>
            @elseif($user->isStudent())
              <th>Teacher</th>
            @endif
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($sessions as $id => $session)
            @if($session['timestamp']->gt(new \Carbon\Carbon()))
            <tr>
              <td>{{ $id+1 }}</td>
              <td>{{ $session['Class'] }}</td>
              <td>{{ $session['Subject'] }}</td>
              <td>{{ $session['Topic'] }}</td>
              <td>{{ $session['Date'] }}</td>
              <td>{{ $session['Time'] }}</td>
              <td>{{ $session['Duration'] }}</td>
              <td><a href="{!! url('profile/'.$session['User']->id) !!}">{{ $session['User']->name }}</a></td>
              <td>
                <button type="submit" class="btn btn-primary">Start</button>
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-primary">Reschedule</button>
              </td>
            </tr>
            @endif
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
    <div role="tabpanel" class="tab-pane fade" id="previous">
      @if(!empty($sessions))
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Topic</th>
            <th>Date</th>
            <th>Time</th>
            <th>Duration</th>
            @if($user->isTeacher())
              <th>Student</th>
            @elseif($user->isStudent())
              <th>Teacher</th>
            @endif
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($sessions as $id => $session)
            @if($session['timestamp']->lt(new \Carbon\Carbon()))
            <tr>
              <td>{{ $id+1 }}</td>
              <td>{{ $session['Class'] }}</td>
              <td>{{ $session['Subject'] }}</td>
              <td>{{ $session['Topic'] }}</td>
              <td>{{ $session['Date'] }}</td>
              <td>{{ $session['Time'] }}</td>
              <td>{{ $session['Duration'] }}</td>
              <td><a href="{!! url('profile/'.$session['User']->id) !!}">{{ $session['User']->name }}</a></td>
              <td>
                <button type="submit" class="btn btn-primary">View Recording</button>
              </td>
            </tr>
            @endif
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>
</main>
@endsection
