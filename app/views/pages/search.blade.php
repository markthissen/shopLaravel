@extends('layouts.layout')
@section('content')

	<div class="col-md-9">

	@foreach($search as $item)
	 <div class="thumbnail">
       
         <div class="caption-full">  
            <h4 class="pull-right">${{$item->price}}</h4>
            <h4>{{HTML::link('product/'.$item->id_category.'/'.$item->id_product,$item->name)}}</h4>
            <p>{{$item->description}}</p>
         </div>

    </div>
	 
	@endforeach

    </div>

    </div>
    
    

@stop