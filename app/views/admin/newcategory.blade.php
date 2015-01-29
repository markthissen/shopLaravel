@extends('layouts.adminlayout')
@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-9">
			<h2> Add new category </h2>

			{{ Form::open() }}
			{{ Form::label('language', 'Language')}}
			{{ Form::select('language', array(1=>'English')) }} <br/>
			{{ Form::label('name', 'Name')}}
			{{ Form::text('name')}} <br/>
			{{ Form::label('description', 'Description')}}
			{{ Form::text('description')}} <br/>
			{{ Form::label('date_add', 'Date added')}}
			{{ Form::text('date_add')}} <br/>
			{{ Form::label('date_upd', 'Date updated')}}
			{{ Form::text('date_upd')}} <br/>
			{{ Form::label('active', 'Active')}}
			{{ Form::text('active')}} <br/>

			<input type="submit" name="newcategory" value="Add" class="btn btn-default">

			{{ Form::close() }}
		</div>


@stop

