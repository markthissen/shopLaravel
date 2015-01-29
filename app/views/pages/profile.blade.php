@extends('layouts.layout')
@section('content')

	<div class="col-md-9">

    <h2> My profile </h2>

    <h3> My personal info </h3>

    {{ Form::open(array('id' => 'idform')) }}

	@foreach($customer_profile_details as $cpd)
        <div class="my_toggle">
        <p> Name: {{ $cpd->name }} </p>
        {{ Form::text('name', $cpd->name, array('id' => 'name', 'style'=>'display:none')) }}
        </div>

        <div class="my_toggle">
        <p> E-mail: {{ $cpd->email }} </p>
        {{ Form::text('email', $cpd->email, array('id' => 'email', 'style'=>'display:none')) }}
        </div>
    @endforeach

    {{ Form::close() }}

    <h3> My addresses </h3>

    {{ Form::open(array('id' => 'idformaddress')) }}

    <ol> 
        @foreach($customer_profile_address as $cpa)

        <li>

        <div class="my_address">
            <p> {{ $cpa->address }} </p>
            {{ Form::text('address', $cpa->address, array('id' => 'address', 'style'=>'display:none')) }}
            {{ Form::text('id_address', $cpa->id_address, array('id' => 'id_address', 'style'=>'display:none', 'disabled'=>'disabled')) }}
        </div>

        <div class="my_address">
            <p> {{ $cpa->city }} </p>
            {{ Form::text('city', $cpa->city, array('id' => 'city', 'style'=>'display:none')) }}
            {{ Form::text('id_address', $cpa->id_address, array('id' => 'id_address', 'style'=>'display:none', 'disabled'=>'disabled')) }}
        </div>

        </li>

        @endforeach

    </ol>

    {{ Form::close() }}

    <p> Add a new address: </p>

    {{ Form::open(array('class' => 'formAddress')) }}
    {{ Form::label('address', 'Address')}} 
    {{ Form::textarea('address', null, ['size' => '30x5']) }} 
    {{ Form::label('city', 'City')}}
    {{ Form::text('city') }} 
    <input type="submit" name="save" value="Save" class="btn btn-default">
    {{ Form::close() }}
    
    <h3> Order history </h3>

    <table class="table table-striped table-bordered">
        <thead>
            <td> Id </td>
            <td> Date created </td>
            <td> Total sum </td>
            <td> Payment </td>
            <td> Shipping </td>
            <td> Status </td>    
        </thead>

        <tbody>
            @foreach($customer_profile_orders as $cpo)
            <tr>
                <td>
                    {{ HTML::link('profile/viewShoppingCart/'.$cpo->id_order, $cpo->id_order); }}
                </td>

                <td>
                    {{ $cpo->date_created }}
                </td>

                <td>
                    {{ $cpo->total_sum }}
                </td>

                <td>
                    {{ $cpo->payment }}
                </td>

                <td>
                    {{ $cpo->address }}
                </td>

                <td>
                    {{ $cpo->status }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    </div>

    <div id="errors"></div>
    <div id="success"></div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>

    <script>

        jQuery(document).ready(function() {
            $('.my_toggle p').click(function(){
                $(this).hide();
                $(this).parent().find('input').show().focus();
            }); 

            $('.my_toggle input').focusout(function(){
                var name = $('#name').attr('name');
                var namevalue = $('#name').val();

                var email = $('#email').attr('email');
                var emailvalue = $('#email').val();

                var inputs = {name:namevalue, email:emailvalue};

                $.post(
                    'profile/ajaxResponder/savePersonalInfo',
                    
                    inputs,
                    function (data) {
                        //aici e fix textu la care faci tu ouptup din ajaxcontorller
                        //sa dai cu json_decode sau sa pui parametru json, cum ai facut in applicatie
                        var data = JSON.parse(data);

                        $(this).hide();                                                                           
                        $(this).parent().find('p').html($(this).val()).show();
                    }
                );
            });
        });    

        jQuery(document).ready(function() {
            $('.my_address p').click(function(){
                $(this).hide();
                $(this).parent().find('input').show().focus();
            }); 

            $('.my_address input').focusout(function(){
                var address = $('#address').attr('address');
                var addressvalue = $('#address').val();

                var city = $('#city').attr('city');
                var cityvalue = $('#city').val();

                var id_address = $('#id_address').attr('id_address');
                var idaddressvalue = $('#id_address').val();


                var inputs = {address:addressvalue, city:cityvalue, id_address:idaddressvalue};

                $.post(
                    'profile/ajaxResponder/saveAddressInfo', 
                    inputs,
                    function (data) {
                        var data = JSON.parse(data);
                        $(this).find('p').html($(this).find('input').val());
                        $(this).find('p').show();
                        $(this).find('input').hide();
                    }
                );
            });
        });         
            

    </script>
    
@stop