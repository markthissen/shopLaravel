@extends('layouts.layout')
@section('content')


			<div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    {{ HTML::image('images/image2.jpg', 'a picture', array('class' => 'slide-image')) }}
                                </div>

                                <div class="item">
                                    {{ HTML::image('images/image2.jpg', 'a picture', array('class' => 'slide-image')) }}
                                </div>

                                <div class="item">
                                    {{ HTML::image('images/image2.jpg', 'a picture', array('class' => 'slide-image')) }}
                                </div>

                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

               <div class="row">
                    
                    @foreach($home as $item)
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo URL::to('/');?>{{$item->image}}"/>
                            <div class="caption">   
                                <h4 class="pull-right">${{$item->price}}</h4>
                                <h4>{{HTML::link('product/'.$item->id_category.'/'.$item->id_product,$item->name)}}</h4>
                                <p>{{$item->description}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
               
       
 

                </div>
                

            </div>

@stop