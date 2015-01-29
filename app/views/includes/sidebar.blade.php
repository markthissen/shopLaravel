<div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                
                <div class="list-group">   
		            @foreach( $categories as $item)
			    		<?php echo HTML::link('category/'.$item->name.'/', $item->name, array('class' => 'list-group-item'));
						?>
					@endforeach
                </div>

                <div class="input-group">
                    {{ Form::open(array('url' => 'search')) }}
                    {{ Form::text('search') }}
                    {{ Form::submit("Search", array('class' => 'btn btn-default')) }}  
                    {{ Form::close() }}
                </div>

                @if(Auth::check())

                <div class="list-group">
                    <?php echo HTML::link('cart', 'View Cart');
                    ?>
                    <p> You have <?php echo $cart_total_qty; ?> items. </p>
                    <p> Your total price is: <?php echo $cart_total_price; ?>. </p>
                </div>

                @else 

                <php echo HTML::link('login', 'Login to view your cart'); ?>

                @endif

            </div>
            

           