@extends('layouts.adminlayout')
@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-9">
			<h2> Display users</h2>
			<table class="table table-striped table-bordered">
		    	<thead>
			    	<tr style="font-weight:bold">
			    		<th>Username</th>
			    		<th>Name</th>
			    		<th>Email</th>
			    		<th>Address</th>
			    		<th>City</th>			    		
			    	</tr>
			    </thead>
			    <tbody>
					@foreach($allusers as $au)
					<tr>
						<td> {{ $au->username }} 
						</td>

						<td> {{ $au->name }}
						</td>

						<td> {{ $au->email }}
						</td>

						<td> {{ $au->address }}
						</td> 

						<td> {{ $au->city }}
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