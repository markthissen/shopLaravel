@extends('layouts.layout')
@section('content')


	<div class="col-md-9">

        {{ HTML::image('images/image2.jpg', 'a picture', array('class' => 'img-responsive')) }}

        <h2> Registration form </h2>

        {{ Form::open(array('action'=> null)) }}
        {{ Form::label("name", "Name") }}
        <br />
        {{ Form::text("name") }}
        <br />
        {{ Form::label("email", "Email") }}
        <br />
        {{ Form::text("email") }}
        <br />
        {{ Form::label("username", "Username") }}
        <br />
        {{ Form::text("username") }}
        <br />
        {{ Form::label("password", "Password") }}
        <br />
        {{ Form::password("password") }}
        <br />
        {{ Form::label("address", "Address") }}
        <br />
        {{ Form::text("address") }}
        <br />
        {{ Form::label("city", "City") }}
        <br />
        {{ Form::text("city") }}
        <br />
        {{ Form::submit("Register",array('class' => 'btn btn-default')) }}
        {{ Form::close() }}

    </div>
@stop