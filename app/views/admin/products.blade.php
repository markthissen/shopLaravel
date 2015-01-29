@extends('layouts.adminlayout')
@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-9">
			<h2> Display products</h2>
			<table class="table table-striped table-bordered">
		    	<thead>
			    	<tr style="font-weight:bold">
			    		<th>Name</th>
			    		<th>Description</th>
			    		<th>Quantity</th>
			    		<th>Price</th>
			    		<th>ID Category</th>
			    		<th>Active</th>
			    		<th>Language</th>
			    		<th>Added</th>
			    		<th>Updated</th>
			    	</tr>
			    </thead>
			    <tbody>
					@foreach($allproducts as $ap)
					<tr>
						<td> {{ $ap->name }} 
						</td>

						<td> {{ $ap->description }}
						</td>

						<td> {{ $ap->quantity }}
						</td>

						<td> {{ $ap->price }}
						</td> 

						<td> {{ $ap->id_category }}
						</td> 

						<td> {{ $ap->active }}
						</td> 

						<td> {{ $ap->language }}
						</td> 

						<td> {{ $ap->date_add }}
						</td> 

						<td> {{ $ap->date_upd }}
						</td>
					</tr>
					@endforeach

					<tr>
				   		<td colspan="6">{{ HTML::link('admin/category/createCategory/', 'Create', array('class' => 'btn btn-default')); }}
				   		{{ HTML::link('admin/category/updateCategory/', 'Update', array('class' => 'btn btn-default')); }}
				   		{{ HTML::link('admin/category/deleteCategory/', 'Delete', array('class' => 'btn btn-default')); }}</td>
				   	</tr>

				</tbody>
			</table>
		</div>

@stop