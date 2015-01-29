<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo HTML::link('/','Home',array('class'=>"navbar-brand"));?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
           
            <ul class="nav navbar-nav">
                <li> <?php echo HTML::link('/about','About');?> </li>
                <li> <?php echo HTML::link('/services','Services');?> </li>
                <li> <?php echo HTML::link('/contact','Contact');?> </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if(!Auth::check())
                    <li>
                        {{ Form::open(array('url' => 'registration')) }}
                        {{ Form::submit("Sign In", array('class' => 'btn btn-default')) }}  
                        {{ Form::close() }}
                    </li> 

                    <li>  
                        {{ Form::open(array('url' => 'login')) }}
                        {{ Form::submit("Login", array('class' => 'btn btn-default')) }}  
                        {{ Form::close() }}
                    </li>

                @else 

                <p style="color:white"> Hello, <?php $name = Auth::user()->name; echo $name; ?></p>

                <li>
                    {{ Form::open(array('url' => 'logout')) }}
                    {{ Form::submit("Logout", array('class' => 'btn btn-default')) }}  
                    {{ Form::close() }}
                </li>

                <li>
                    {{ Form::open(array('url' => 'profile')) }}
                    {{ Form::submit("View profile", array('class' => 'btn btn-default')) }}  
                    {{ Form::close() }}
                </li>

                @endif

            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>