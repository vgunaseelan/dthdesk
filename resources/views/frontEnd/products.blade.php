@extends('frontEnd.layouts.master')
@section('title','List Products')
@section('slider')
@endsection
@section('content')
   
<div class="banner-container" id = 'target-container'>
        <div id="myCarousels" class="carousel slide carousel-fade" data-ride="carousel" data-interval = '7000' data-pause = false>
             <ol class="carousel-indicators">
                <li data-target="#myCarousels" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousels" data-slide-to="1"></li>
                <li data-target="#myCarousels" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active slider1" id = 'xstream-container'>
                    <img src="{{asset('frontEnd/dthdesk/image/banner/slider1a.jpg')}}" alt="">
                    <div class="xstream-text">
                        <h3 class="xstream-header">Don't Just Watch<br>
                            Tv on Your Tv</h3>
                        <p class="xstream-para">Movies, apps, games &amp; TV channels – now all on<br>
                            your TV with Airtel Xstream Box</p>
                            <div><a class="buy-now cursor-pointer" href="#" target="">Buy @ Rs.3999 Only</a></div>
                            <div class="get-call cursor-pointer">Get a Call</div>
                    </div>
                </div>
                <div class="carousel-item slider2">
                    <img src="{{asset('frontEnd/dthdesk/image/banner/slider2b.jpg')}}" alt="">
                </div>
                <div class="carousel-item slider3">
                    <img src="{{asset('frontEnd/dthdesk/image/banner/banner3.webp')}}" alt="">
                </div>
            </div>
            <!--<a class="carousel-control-prev" href="#myCarousels" role="button" data-slide="prev">-->
            <!--    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
            <!--    <span class="sr-only">Previous</span>-->
            <!--</a>-->
            <!--<a class="carousel-control-next" href="#myCarousels" role="button" data-slide="next">-->
            <!--    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
            <!--    <span class="sr-only">Next</span>-->
            <!--</a>-->
        </div>
</div>


<div class="main-contaniner">
    <div class="categories-container">
        <div class="our-cat">
            <div class="category-img-container">
                <a href="#"> <img src="{{asset('frontEnd/dthdesk/image/banner/airtelSD.png')}}" alt=""></a> 
            </div>
        </div>

        <div class="our-cat">
            <div class="category-img-container">
                    <a href="#"><img src="{{asset('frontEnd/dthdesk/image/banner/airtelHd.png')}}" alt=""></a>
            </div>
        </div>

        <div class="our-cat">
            <div class="category-img-container">
                    <a href="#"><img src="{{asset('frontEnd/dthdesk/image/banner/slider1.png')}}" alt=""></a>
            </div>
        </div>
    </div>
<?php
$packages =DB::table('packages')->orderBy('created_at','desc')->limit(5)->get();

?>
    <section class="brand_section" style="padding-bottom:0px">
    <h1 class="offerce_head">Popular Packages</h1>
    <div class="package-group">

        @foreach($packages as $package)
            <div class="brand-item">    
                        
                <a href="{{url('channelpackages',$package->p_id)}}"><figure>
                    <div class = 'item-img'>
                        <img src="{{url('mainpackages/large',$package->pack_image)}}" alt=""> 
                    </div>
                    
                    <figcaption class="text-center">{{$package->pack_name}} Packages</figcaption>
                     <div class="text-center"><span class="btn btn-primary"><i class="fas fa fa-check"></i>&nbsp;{{$package->pack_name}}</span></div>
                </figure></a>             
            </div>
        @endforeach  
    </div>
    <div class="morepackages">        
            <a href="{{url('channelpackages')}}">
                <div class="text-center"><span class="btn more-packages-btn"><i class="fas fa fa-eye"></i>&nbsp;More Packages</span>
                </div>
            </a>             
    </div>
    </section><br><br>








<!-- <section class="brand_section"> -->
<div class="product-contain"  style="padding-top:140px;">
@include('frontEnd.layouts.category_menu')
                    <?php
                            if($byCate!=""){
                                $products=$list_product;
                                // echo '<h6 class="title text-center">Category '.$byCate->name.'</h6>';    
                            }else{
                                echo '<h2 class="title text-center">List Products</h2>';
                            }
                    ?>
      <div class="brand-group ">        
                    
                    @foreach($products as $product)
                    <div class="brand-item" id="product">
                        @if($product->category->status==1)
                        <a href="{{url('/product-detail',$product->id)}}"><figure>
                        <div class = 'item-img'>
                        <img src="{{url('products/small/',$product->image)}}" alt=""> 
                        </div>


                        <figcaption class="">{{$product->p_name}}</figcaption>
                        @php
                            $price = $product->old_price;
                        @endphp                               
                        @if ($price>0)
                            <span class="mrp"><i class="fas fa-rupee-sign"></i>{{$product->old_price}}</span>
                        @endif
                        <input type="hidden" name="products_id" value="{{$product->id}}">
                        <input type="hidden" name="product_name" value="{{$product->p_name}}" class="product_name">
                        <input type="hidden" name="product_image" value="{{$product->image}}" class="product_image">
                        <input type="hidden" name="product_price" id="price" value="{{$product->price}}" class="product_price">
                        
                        <span class="actual-price"><i class="fas fa-rupee-sign"></i>{{$product->price}}</span>
                        <!-- <span class = 'cart'><i class="fas fa-shopping-cart"></i></span> -->
                        </figure></a>
                        @endif </div>
                    @endforeach
                    </div>

</section>
</div>
</div>

<div class="app-container">
    <div class="app-inner-container">
        <div class="app-content">
        <p>Exclusive <span class = 'app-title'>Interactive App</span></p>
            <div class = 'app-btn'>
                <a href="#">Coming soon!</a>
            </div>
        </div>

        <div class="app-content">
            <div class="app-img">
                <img src="{{asset('frontEnd/dthdesk/image/banner/android.png')}}" alt="Android Store">
                
            </div>
            <p>Play Store</p>
        </div>

        <div class="app-content">
            <div class="app-img">
                <img src="{{asset('frontEnd/dthdesk/image/banner/ios.jpg')}}" alt="IOS Store">
            </div>
            <p>App Store</p>
        </div>
    </div>
</div>


<div class="body-container">
    <div class="subscrib-image-banner">
        <div class = 'row'>
        <div class="contact-section col-12 col-sm-8 offset-sm-2 col-md-5 offset-md-1">
            <form   id="contactfrm" method="post" class="contact-form ">	
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <h3 class="text-center">Contact us</h3><br>

               <div class="ajaxmessage text-center" style="display:none;"></div>

                <div class="form-group">
                    <input name="name" id="name" placeholder="Name" type="text" class="contact-form-text form-control" >
                </div>
                <div class="form-group">
                        <input name="email" id="email" placeholder="Email" type="text" class=" contact-form-text form-control">
                </div>
    
                <div class="form-group">
                    <input name="phone" id="phone" value="" size="40" aria-invalid="false" class="contact-form-text form-control" placeholder="Phone" type="text" >
                </div>    
            
                <div class="form-group">
                        <input name="pincode" id="pincode" placeholder="Pincode" type="text" class= "contact-form-text form-control">
                </div>
    
                <div class="form-group">
                    <textarea name="comment" id="comment" aria-invalid="false" rows = '7' placeholder="Your message" class=" contact-form-text form-control"></textarea>
                </div>
                
                <div class=" form-group form-btn text-center">
                    <!-- <input value="Send Message" class="contact-form-btn btn submit-btn enquire-form" type="submit">	 -->
                    <button type="button" class="contact-form-btn btn submit-btn enquire-form" id="butsave">Send Message</button>	
                </div>
            </form>
        </div>

        <div class="newsletter-container col-12 col-sm-8 offset-sm-2 col-md-5 offset-md-1">
            <div class="">
                <h3>Subscribe to get discount coupons & new offers!</h3><br>
                <div class="subscribmessage" style="display:none;"></div>
                <div class="row">
                    <div class="col-md-12 col-lg-8 form-group" >
                        <input type="text" placeholder="Email. . . " id="sub-email" class = 'form-control subscribe-field'>
                    </div>
                    
                    <div class="col-md-12 col-lg-4 form-group">
                    <button type="button" id="subbtn"  class = 'btn newsletter-btn form-control text-center'>Subscribe  </button>                  
                    </div>
                </div>
            </div>
        </div> 
    </div> 
    </div>
</div>

<div class="clientbrand">
    <div class="box-slider">
        <div class="client-img">
            <img src="{{asset('frontEnd/dthdesk/image/brand/dth/same-day-installation.png')}}" alt="">
        </div>
        <h3>Same Day Delivery</h3>
    </div>

    <div class="box-slider">
        <div class="client-img">
            <img src="{{asset('frontEnd/dthdesk/image/brand/dth/free-installation.png')}}" alt="">
        </div>
            <h3>Free Installation</h3>
    </div>

    <div class="box-slider">
        <div class="client-img">
            <img src="{{asset('frontEnd/dthdesk/image/brand/dth/nationwide-shipping.png')}}" alt="">
        </div>
        <h3>Nationwide Shipping</h3>
    </div>

    <div class="box-slider">
        <div class="client-img">
            <img src="{{asset('frontEnd/dthdesk/image/brand/dth/24-7-order.png')}}" alt="">
        </div>
        <h3>Order 24/7</h3>
    </div>
</div>
  

<div class="payments">
    <div class="payments-inner-container">
        <div class="left-way payment-info">
            <div class="pay-container1">
                <div class="pay-container1-inner">
                <div class="pay-img"><i class="far fa-credit-card"></i></div>
                <h4 class="pay-head">Payment method</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos odit ipsa dignissimos minus nisi doloremque cum alias</p>
                <div class="payment-icons">
                    <div class="icon-images">
                        <i class="fab fa-cc-paypal"></i>
                    </div>
                    <div class="icon-images">
                        <i class="fab fa-cc-visa"></i>
                    </div>
                    <div class="icon-images">
                        <i class="fab fa-cc-mastercard"></i>
                    </div>
                    <div class="icon-images">
                        <i class="fab fa-cc-amex"></i>
                    </div>
                </div>

                </div>
            </div>
        </div>

        <div class="right-way payment-info">
            <div class="pay-container2">
                <div class="pay-container1-inner">
                <div class="pay-img"><i class="fas fa-truck"></i></div>
                <h4 class="pay-head">Shipment and delivery </h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, nesciunt illum.
                Architecto reiciendis.</p>
                <ul class="delivery-list">
                    <li><b><span class="rightarrow">&gt;</span> Lorem ipsum dolor sit amet </b></li>
                    <li><b><span class="rightarrow">&gt;</span> Morbi rutrum ex ultricies, mollis magna sed </b></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
                   <!--  {{--<ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>--}} -->
                <!-- </div> -->
                <!--features_items-->
       <!--      </div>
        </div>
    </div> -->
@endsection
<script  src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
    <script>
    $(document).ready(function () {
        // Handler for .ready() called.
       $('html, body').animate({ scrollTop: $('.product-contain').offset().top }, 100);
    });
</script>