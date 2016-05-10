<?php $page = 'login'; ?>
@extends('layouts.master')
@section('content')
    <div class="gutter-md"></div>

    <!-- Display Validation Errors -->
    @include('layouts.includes.errors')
<div class="row">
    <form class="col-xs-offset-3 col-xs-6" action="/password/reset" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="token" value="{{ $token }}">
        <fieldset class="form-group">
            <label class="sr-only" for="email">Email address</label>
            <div class="input-group">
                <div class="input-group-addon">Email address</div>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="sr-only" for="password">Password</label>
            <div class="input-group">
                <div class="input-group-addon">Password</div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="sr-only" for="password">Password repeat</label>
            <div class="input-group">
                <div class="input-group-addon">Password repeat</div>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat password">
            </div>
        </fieldset>
        <div>
            <button type="submit" class="btn btn-primary">RESET PASSWORD</button>
        </div>
    </form>
</div>
<div class="gutter-md"></div><div class="gutter-md"></div>
@endsection
