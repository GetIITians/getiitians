@extends('layouts.master')
@section('content')
<!-- Display Validation Errors -->
@include('errors.errors')
<div class="row">
    <form class="col-xs-offset-2 col-xs-8" action="/password/email" method="POST">
        {!! csrf_field() !!}
        <fieldset class="form-group">
            <label class="sr-only" for="email">Email address</label>
            <div class="input-group">
                <div class="input-group-addon">Email address</div>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
            </div>
        </fieldset>
        <div class="col-xs-offset-3 col-xs-6">
            <button type="submit" class="btn btn-primary">SEND PASSWORD RESET LINK</button>
        </div>
    </form>
</div>
@endsection