@extends('layouts.adminlayout')
@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-9">
			<h2> Order Details </h2>
			<table class="table table-striped table-bordered">
		    	<thead>
			    	<tr style="font-weight:bold">
			    		
			    		<th>Customer name</th>
			    		<th>Shipping</th>
			    		<th>Payment</th>
			    		
			    	</tr>
			    </thead>
			    <tbody>
					@foreach($orderdetails as $od)
					<tr>
						<td> {{ $od->name }}
						</td>

						<td> {{ $od->address }}
						</td>

						<td> {{ $od->payment }}
						</td> 
				  
				   	</tr>
				   	@endforeach	

				</tbody>
			</table>

			{{ HTML::link('admin/orders', 'Back to orders', array('class' => 'btn btn-default')) }}

		</div>

@stop

