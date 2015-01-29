@extends('layouts.layout')
@section('content')

<div class="col-md-9">
    
    {{ HTML::image('images/image2.jpg', 'a picture', array('class' => 'img-responsive')) }}
            
	@foreach($product as $item)
        <div class="thumbnail">
            <img src="<?php echo URL::to('/');?>{{$item->image}}"/>
             <div class="caption-full">  
                <h4 class="pull-right">${{$item->price}}</h4>
                <h4>{{$item->name}}</h4>
                <p>{{$item->description}}</p>

                

                {{ Form::open(array('url' => 'addtocart/'.$category_id.'/'.$product_id)) }}

                {{ Form::hidden('id_product',$item->id_product)}}
                {{ Form::submit("Add to cart",array('class' => 'btn btn-default')) }}  
                {{ Form::close() }}

            </div>

            <div class="ratings">
                <p class="pull-right">18 reviews</p>
                <p>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    4.0 stars
                </p>
            </div>
        </div>

        <div class="well">

            <div class="text-right">
                <a class="btn btn-success">Leave a Review</a>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    Anonymous
                    <span class="pull-right">10 days ago</span>
                    <p>This product was great in terms of quality. I would definitely buy another!</p>
                </div>
            </div>
        </div>

</div>
    
    </div>
	@endforeach
	</div>
</div>

@stop