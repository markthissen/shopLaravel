@extends('layouts.adminlayout')
@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-9">
			<h2> Display categories</h2>
			<h3> Number of categories </h3>
			{{ $categories }}
			<h3> Categories </h4>
			{{ Form::open() }}
			<table class="table table-striped table-bordered">
		    	<thead>
			    	<tr style="font-weight:bold">
			    		<th>Name</th>
			    		<th>Description</th>
			    		<th>Active</th>
			    		<th>Language</th>
			    		<th>Added</th>
			    		<th>Updated</th>
			    		<th>Delete</th>
			    	</tr>
			    </thead>
			    <tbody>
					@foreach($allcategories as $ac)
					<tr>
						<td> 
							{{ Form::hidden('id_category[]', $ac->id_category) }}
							{{ Form::text('name[]', $ac->name) }} 
						</td>

						<td> {{ Form::textarea('description[]', $ac->description, ['size'=>'30x5']) }}
						</td>

						<td> {{ Form::text('active[]', $ac->active) }}
						</td>

						<td> {{ Form::text('language', $ac->language, ['disabled'=>'disabled']) }}
						</td> 

						<td> {{ Form::text('date_add', $ac->date_add, ['disabled'=>'disabled']) }}
						</td> 

						<td> {{ Form::text('date_upd[]', $ac->date_upd) }}
						</td>

						<td>{{ Form::checkbox('my_checkbox[]', $ac->id_category) }}
						</td>
					</tr>
					@endforeach

					<tr>
				   		<td colspan="6">{{ HTML::link('admin/category/createCategory/', 'Create', array('class' => 'btn btn-default')); }}
				   		<input type="submit" name="updatecategory" value="Update" class="btn btn-default">
				   		<input type="submit" name="deletecategory" value="Delete" class="btn btn-default">
				   	</tr>

				</tbody>
			</table>
			{{ Form::close() }}

		</div>

@stop