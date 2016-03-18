<?php $page = 'login'; ?>
@extends ('layouts.master')
@section('content')
    <div class="gutter-md"></div>

<!-- Display Validation Errors -->
@include('layouts.includes.errors')

<div class="row">
    <form class="col-xs-offset-2 col-xs-8" action="/login" method="POST">
        {!! csrf_field() !!}
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
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </fieldset>
        <div class="checkbox">
            <label class="c-input c-checkbox">
                <input type="checkbox" name="remember"><span class="c-indicator"></span> Remember Me
            </label>
        </div>
        <div class="col-xs-offset-3 col-xs-6">
            <button type="submit" class="btn btn-primary">LOGIN</button>
        </div>
        <small><a href="/password/email">Forgot password ?</a></small>
    </form>
</div>
    <div class="gutter-md"></div>
@endsection