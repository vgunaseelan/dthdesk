<div class="menu-container" id = 'menu-container'>
        <div class="inner-menu-container">
        <div class="logo-img">
            <a href="{{action('IndexController@index')}}">
                <img src="{{asset('frontEnd/dthdesk/image/airtel.png')}}" alt="Logo">
            </a>
        </div>

        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
           
        <div class="regular-nav">         
            <ul>
                <li><a href="{{action('IndexController@index')}}"> Airtel DTH</a></li>
                <li><a href="{{action('XstreamController@index')}}"> Airtel Xstream</a></li>
                <li><a href="{{action('ChannelPackagesController@index')}}"> Packages</a></li>
                <li class="main_channel"><a>Channels</a>
                    <ul class="channel_list_types">
                            
                    </ul> 
                </li>

                <li><a href="#"> Offers</a></li>                
                <li><a href="{{action('ContactController@index')}}"> Contact Us</a></li>
                <li><a href="{{action('AddtocartController@create')}}"><i class="fa fa-shopping-cart">               
                @if(Session::has('cart') || Session::has('packages'))    
                        <?php 
                            error_reporting(0);
                            $total ="";
                        ?>
                    @if(Session::has('packages'))
                        @php
                            $count = Session::get('packages');
                            $total+= count($count);
                        @endphp
                    @endif   
                    @if(Session::has('cart'))
                        @php
                            $count = Session::get('cart');
                            $total+= count($count);
                        @endphp
                    @endif                   
                   </i><sup class = 'cart-counter'>{{$total}}</sup> Cart</a></li>               
                
                @else
                    </i>Cart</a></li>
                @endif

                @if(Session::has('frontSession'))
                    <li><a href="{{url('/myaccount')}}"><i class="fa fa-user"></i> My Account</a></li>
                    <li><a href="{{url('/myorders')}}"><i class="fa fa-shopping-basket"></i> My Orders</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Logout </a>
                    </li>
                @else
                    <li><a href="{{url('/login_page')}}"><i class="fa fa-lock"></i> Login</a></li>
                @endif
                
            </ul>
        </div>

        <div class="hamburger">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>

        <div class="responsive-nav">
            <ul>
                <li><a href="{{action('IndexController@index')}}"> Airtel DTH</a></li>
                <li><a href="{{action('XstreamController@index')}}"> Airtel Xstream</a></li>
                <li><a href="{{action('ChannelPackagesController@index')}}"> Packages</a></li>
                <li class="mobile_main_channel"><a">Channels <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    <ul class="channel_list_types">

                    </ul> 
                </li>
                <li><a href="#"> Offers</a></li>               
                <li><a href="{{action('ContactController@index')}}"> Contact Us</a></li>
                <li><a href="{{action('AddtocartController@create')}}"><i class="fa fa-shopping-cart">               
                @if(Session::has('cart') || Session::has('packages'))    
                        <?php 
                            error_reporting(0);
                            $total ="";
                        ?>
                    @if(Session::has('packages'))
                        @php
                            $count = Session::get('packages');
                            $total+= count($count);
                        @endphp
                    @endif   
                    @if(Session::has('cart'))
                        @php
                            $count = Session::get('cart');
                            $total+= count($count);
                        @endphp
                    @endif              
                   </i><sup class = 'cart-counter'>{{$total}}</sup> Cart</a></li>
                @else
                    </i> Cart</a></li>
                @endif

                @if(Session::has('frontSession'))
                    <li><a href="{{url('/myaccount')}}"><i class="fa fa-user"></i> My Account</a></li>
                    <li><a href="{{url('/myorders')}}"><i class="fa fa-shopping-basket"></i> My Orders</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Logout </a>
                    </li>
                @else
                    <li><a href="{{url('/login_page')}}"><i class="fa fa-lock"></i> Login</a></li>
                @endif
            </ul>
        </div>
            
    </div> 
