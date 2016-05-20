@extends ('layouts.dashboard')
@section('main')
<script>
    var routeURL = <?php echo json_encode(url('dashboard/update/')); ?>;
</script>
<?php /* ?>
<div class="container">
    @foreach ($teachers as $teacher)
        {{ $teacher->display }}
    @endforeach
</div>

{!! $teachers->render() !!}
<?php */ ?>

<main class="col-xs-12 col-sm-10" id="adminTeachers">
  <div class="gutter-sm"></div>
  <h2>Teachers</h2>
  <hr>
  <div class="row">
    <div class="col-xs-1">
      ID
    </div>
    <div class="col-xs-offset-1 col-xs-2">
      Name
    </div>
    <div class="col-xs-2">
      Joined
    </div>
    <div class="col-xs-4">
      City
    </div>
    <div class="col-xs-1">
      Status
    </div>
  </div>
  <hr>
  @foreach($teachers as $teacher)
    <?php $user = $teacher->user; ?>
    <div class="row teacher">
      <div class="col-xs-1">
          {{ $teacher->id }}
      </div>
      <div class="col-xs-1">
        <img class="img-responsive round" src="{!! asset($user->picture) !!}">
      </div>
      <div class="col-xs-2">
        <a href="dashboard/{{ $user->id }}">{{ $user->name }}</a>
      </div>
      <div class="col-xs-2">
        {!! $user->created_at->diffForHumans(); !!}
      </div>
      <div class="col-xs-4">
        {{ $user->city }}
      </div>
      <div class="col-xs-1">
          @if(is_null($teacher->display))
          <h6><span class="label label-info">New</span></h6>
          @elseif($teacher->display === 0)
          <h6><span class="label label-warning">Rejected</span></h6>
          @elseif($teacher->display === 1)
          <h6><span class="label label-success">Accepted</span></h6>
          @endif
      </div>
      <div class="col-xs-1">
        <form action="{{ url('dashboard/update/'.$teacher->id.'/display') }}">
          {{ csrf_field() }}
          <a class="text-success teacher_accept" href="#" title="Accept" data-id="{{ $teacher->id }}" data-status="1"><i class="material-icons md-18">check_circle</i></a>
          <a class="text-warning teacher_reject" href="#" title="Reject" data-id="{{ $teacher->id }}" data-status="0"><i class="material-icons md-18">highlight_off</i></a>
        </form>
      </div>
    </div>
  @endforeach
  <hr>
  <div class="gutter-sm"></div>
  <div class="row"><div class="col-xs-12 text-center">{!! $teachers->render() !!}</div></div>
  <div class="gutter-sm"></div>
</main>


@endsection
