@extends('layouts.layout')
@section('content')

<div class="col-md-9">    
    {{ HTML::image('images/image2.jpg', 'a picture', array('class' => 'img-responsive')) }}
    <h2>Your shopping cart</h2>

    @if (empty($mycart)) 
		<p> Your cart is empty </p>
	
	@else 

	    {{ Form::open() }}
	    <table class="table table-striped table-bordered">
	    	<thead>
		    	<tr style="font-weight:bold">
		    		<th>Remove</th>
		    		<th>Name</th>
		    		<th>Price</th>
		    		<th>Quantity</th>
		    		<th>Total</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	
		    	@foreach($mycart as $item)
				<tr>
					<td>
						{{ Form::checkbox('my_checkbox[]', $item->id_product) }}
					</td>
					<td>
						{{ Form::label('name', $item->name); }}
					</td>
					<td>
						{{ Form::label('price', $item->price); }}
					</td>
					<td>
						{{ Form::text('qty[]', $item->qty); }}
						{{ Form::hidden('id_product[]', $item->id_product); }}
					</td>
					<td>
						<?php echo $item->total; ?>
					</td>
				</tr>
				@endforeach

			</tbody>
		   	<tr>
		   		<td colspan="2">{{ Form::submit('Update', array('class' => 'btn btn-default')); }}</td>
		   		<td colspan="3">{{ HTML::link('/checkout/'.$cart_id, 'Checkout', array('class' => 'btn btn-default')); }}</td>
		   	</tr>

	   	</table>

	 	{{ Form::close() }}

 	@endif

</div>

@stop