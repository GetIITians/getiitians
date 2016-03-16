<?php $page = 'signup'; ?>
@extends ('layouts.master')
@section('content')
    <div class="gutter-md"></div>

<!-- Display Validation Errors -->
@include('layouts.includes.errors')

<div class="row">
    <!--
    <div class="col-xs-offset-2 col-xs-8">
        <a class="oauth" href="">facebook</a><a href="" class="pull-right oauth">google</a>
    </div>
    -->
    <form class="col-xs-offset-4 col-xs-4" action="/signup" method="POST">
        {{ csrf_field() }}
        <fieldset class="form-group">
            <label class="sr-only" for="name">Full name</label>
            <div class="input-group">
                <div class="input-group-addon">Full name</div>
                <input type="text" class="form-control" id="name" name="name" placeholder="Full name">
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="sr-only" for="email">Email address</label>
            <div class="input-group">
                <div class="input-group-addon">Email address</div>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <small class="text-muted">We'll never share your email with anyone else.</small>
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
        <div class="radio">
            Sign up as :
            <label class="radio-inline">
                <input type="radio" name="signuptype" id="signuptype" value="student"> Student
            </label>
            <label class="radio-inline">
                <input type="radio" name="signuptype" id="signuptype" value="teacher"> Teacher
            </label>
        </div>
        <div class="col-xs-offset-3 col-xs-6">
            <button type="submit" class="btn btn-primary">SIGNUP</button>
            <small class="text-muted text-left">By clicking on submit, you agree to our terms of use.</small>
        </div>
    </form>
</div>
@endsection