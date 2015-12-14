@extends ('layouts.master')
@section('content')
    <div class="jumbotron jumbotron-fluid" id="profile">
        <div class="container-fluid">
            <div class="row">
                @include('frontend.profile.sidebar')
                @yield('main')
            </div>
        </div>
    </div>
@endsection