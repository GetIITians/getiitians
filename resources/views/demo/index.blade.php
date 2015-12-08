@extends ('layouts.master')
@section('content')
    <!-- Display Validation Errors -->
    @include('errors.errors')
    <div class="row">
        <div class="container">
            {{ $boom }}
        </div>
    </div>
@endsection