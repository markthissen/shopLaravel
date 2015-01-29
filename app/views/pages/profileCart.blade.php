@extends('layouts.layout')
@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-9">
			<h3> Shopping Cart </h3>
			<table class="table table-striped table-bordered">
				<thead>
			    	<tr style="font-weight:bold">
			    		<th>Product</th>			    		
			    		<th>Quantity</th>
			    		<th>Price</th>
			    	</tr>
			    </thead>

			    <tbody>
				@foreach($shopping_cart as $sc)
					<tr>
						<td>
							{{ $sc->name }}
						</td>
						<td>
							{{ $sc->qty }}
						</td>
						<td>
							{{ $sc->price }}
						</td>						
					</tr>
				@endforeach
				</tbody>

			</table>

			{{ HTML::link('profile', 'Back to profile', array('class' => 'btn btn-default')) }}

		</div>
@stop