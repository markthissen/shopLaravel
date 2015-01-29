@extends('layouts.layout')
@section('content')

	<div class="col-md-9">

	    {{ HTML::image('images/image2.jpg', 'a picture', array('class' => 'img-responsive')) }}

		{{ Form::open(array('action' => null)) }}
			<h1>Login</h1>
			<p>
				{{ Form::label('username', 'Username') }}
				{{ Form::text('username') }}
			</p>

			<p>
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password') }}
			</p>

			<p>{{ Form::submit('Submit', array('class' => 'btn btn-default')) }}</p>
		{{ Form::close() }}

	</div>

@stop
