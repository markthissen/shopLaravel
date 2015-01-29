@extends('layouts.adminlayout')
@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-9">
			<h2> Display orders</h2>
			Total orders: {{ $orders }}
			<h3> Orders </h3>
			<table class="table table-striped table-bordered">
		    	<thead>
			    	<tr style="font-weight:bold">
			    		<th>ID</th>
			    		<th>Status</th>
			    		<th>Date created</th>
			    		<th>Date updated</th>
			    		<th colspan="3">Operations</th>
			    	
			    	</tr>
			    </thead>
			    <tbody>
					@foreach($allorders as $ao)
					<tr>
						<td> {{ $ao->id_order }}
						</td>

						<td> {{ $ao->status }}
						</td>

						<td> {{ $ao->date_created }}
						</td> 

						<td> {{ $ao->date_updated }}
						</td> 

				   		<td> {{ HTML::link('admin/orders/viewOrderDetail/'.$ao->id_order, 'View Details', array('class' => 'btn btn-default')); }} </td>
				   		<td> {{ HTML::link('admin/orders/updateOrder/'.$ao->id_order, 'Update', array('class' => 'btn btn-default')); }} </td> 
				   		<td> {{ HTML::link('admin/orders/deleteOrder/'.$ao->id_order, 'Delete', array('class' => 'btn btn-default')); }} </td>
				  
				   	</tr>
				   	@endforeach	

				</tbody>
			</table>
		</div>

@stop