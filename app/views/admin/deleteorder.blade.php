@extends('layouts.adminlayout')
@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-9">
			<h2> Delete Order </h2>
			{{ Form::open() }}
			{{ Form::label('qst', 'Are you sure you want to delete this order?') }} <br />
			<input type="submit" name="deleteorder" value="Yes" class="btn btn-default">
			{{ HTML::link('admin/orders', 'No. Go back.', array('class' => 'btn btn-default')); }}
			{{ Form::close() }}
		</div>
@stop