@extends('layouts.adminlayout')
@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-9">
			<h2> Admin dashboard </h2>
			<h3> Total products </h3>
			{{ $products }}
			<h3> Total clients </h3>
			{{ $clients }}
			
		</div>

@stop