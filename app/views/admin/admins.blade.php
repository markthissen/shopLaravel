@extends('layouts.adminlayout')
@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-9">
			<h2> Display admins</h2>
			<h3> Number of admins </h3>
			{{ $admins }}
			<h3> Admins </h3>
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
					@foreach($alladmins as $am)
					<tr>
						<td> {{ $am->username }} 
						</td>

						<td> {{ $am->name }}
						</td>

						<td> {{ $am->email }}
						</td>

						<td> {{ $am->address }}
						</td> 

						<td> {{ $am->city }}
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