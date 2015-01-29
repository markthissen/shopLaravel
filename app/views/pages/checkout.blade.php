@extends('layouts.layout')
@section('content')

<div class="col-md-9">
   
   <h2>Checkout</h2>

   <ol>
   		<li>Your information</li>

   		@foreach($customer as $mycustomer)
	   		<strong> E-mail </strong>
	   		{{ $mycustomer->email }} <br/>

	   		<strong> Name </strong>
	   		{{ $mycustomer->name }} <br/>

	   	@endforeach

   		<li>Billing & Shipping information</li>

   		<strong><small> Shipping is $5. </small></strong>

   		{{ Form::open() }}
   		
   		{{ Form::label('billingAddress', 'Address Billing')}}

   		{{ Form::select('billing', $address) }} <br/>
   		
   		{{ Form::label('shipping', 'Address Shipping')}}

   		{{ Form::select('shipping', $address) }} <br/>

   		{{ HTML::link('/profile', 'Add a new address'); }}

   		<li>Payment information</li>

		{{ Form::radio('payment', 'cash'); }} Cash <br/>
		{{ Form::radio('payment', 'credit'); }} Credit
		
   		<li>Order Review</li>

   		<p> Your total sum is: ${{ $total }} </p>

   		<p> Forgot an item? {{ HTML::link('cart', 'Back To Cart'); }} </p>
	   		
   </ol>
   		<input type="submit" name="order" value="Place Order" class="btn btn-default">

   		{{ Form::close() }}



</div>

@stop