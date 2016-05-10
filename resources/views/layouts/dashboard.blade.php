@extends ('layouts.master')
@section('content')
<div class="container-fluid" id="dashboard">
  <div class="row">
    @include('dashboard.sidebar')
    @yield('main')
  </div>
</div>
@endsection
