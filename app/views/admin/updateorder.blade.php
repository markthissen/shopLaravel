@extends('layouts.adminlayout')
@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-9">
			<h2> Update Order </h2>
			
			{{ Form::open() }}
			{{ Form::label('status', 'Status') }}
			{{ Form::text('status') }}
			{{ Form::label('date_updated', 'Date updated') }}
			{{ Form::text('date_updated') }}
			<input type="submit" name="updateorder" value="Save" class="btn btn-default">
			{{ Form::close() }}

			{{ HTML::link('admin/orders', 'Back to orders', array('class' => 'btn btn-default')) }}
		</div>

@stop