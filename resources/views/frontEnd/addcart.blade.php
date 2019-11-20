@extends('frontEnd.layouts.master')
@section('title','Cart Page')
@section('slider')
@endsection
@section('content')


<?php
error_reporting(0);
   /*  $id = $detail_product->categories_id; 
    $categories=DB::table('categories')->where('id',$id)->first();
    $cat_id=$categories->id; */
    // echo $cat_id;    
?>
<div class="product-main-container" id = 'target-container'>
    <div class="breadcrumbs-container">
        <div class="breadcrumbs-inner-container">
            <div class="col-left">
                <h1>Cart</h1>
            </div>

            <div class="col-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{action('IndexController@index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span class = 'active-link'>Cart</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    
    <p class="return-message"></p>
    @if(Session::has('success'))
        <p class="alert alert-info text-center add-success">{{ Session::get('success') }}</p>        
    @endif

@if(session('cart') || session('packages'))
    @php 
        $total = 0;
    @endphp
        
    <div class="cart-body-right-container">
            <div class="cart-body-right-container-content">
                <div class='section-title'><h3>Order summary</h3></div>
                <div class="summary-details">
                    <div class="total-price">
                        <!-- <p class = 'product-price grand-total'>Grand Total: <i class="fas fa-rupee-sign"></i>
                        <span class="total-amt"></span></p> -->

                        <p class = 'product-price grand-total'>Grand total: <i class="fas fa-rupee-sign"></i><span class="total-amt"></span></p>
                    </div>
                    
                    <div class="checkout-proceed">
                        <a href="{{url('/check-out')}}"><div class="checkout-proceed-btn">
                            Proceed to checkout
                        </div></a>
                    </div>

                    <div class="continue-shopping">
                        <a href="{{action('IndexController@index')}}"><div class="continue-shopping-btn">
                            Continue shopping
                        </div></a>
                    </div>
                </div>
            </div>
    </div>

         
    @if(session('cart'))
    <div class='section-title cart-body-parent-container'><h3>Product(s)</h3></div> 
        @foreach(session('cart') as $id => $details)   
            @php
                $amt = $details['price'] * $details['quantity'];
                $total += $amt;
            @endphp                      
        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
        <div class="cart-body-parent-container">
        <div class="cart-body-left-container">
            <div class="products-cart">
                
                <p class="empty-cart-msg"></p>
                <div class="cart-product-details">
                    
                    <div class="cart-product-image">
                        <img src="{{url('products/small',$details['image'])}}" alt="">
                    </div>

                    <div class="cart-product-info">
                        <div class="cart-product-name">
                            <h4>{{$details['name_product']}}</h4>
                        </div>
                        <input type="hidden" class="product-id" value="{{$details['id']}}">
                        <input type="hidden" class="p-price" value="{{$details['price']}}">
                        <input type="hidden" class="product-name" value="{{$details['name_product']}}">
                        <input type="hidden" class="product-image" value="{{$details['image']}}">

                        <div class="cart-product-price cart-product-details-section">
                            <p class = 'product-price'>Price: <i class="fas fa-rupee-sign"></i><span class="myPrice">{{$details['price']}}</span></p>
                            <!-- <p class = 'product-price'>Total Price: <i class="fas fa-rupee-sign"></i><span class="myPrice">{{ $details['price'] * $details['quantity'] }}</span></p> -->
                            <p class = 'product-price'>Qty: <span class="myPrice">{{ $details['quantity']}}</span></p>
                        </div>

                        <!-- <div class="product-quantity cart-product-details-section">
                            <i class="fas fa-arrow-down quantity-decr"></i>
                            <input type="number" value="{{ $details['quantity'] }}" class="quantity update-qty" />
                            <i class="fas fa-arrow-up quantity-incr"></i>
                        </div> -->

                        <div class="cart-update-remove cart-product-details-section">
                           <!--  <div class="cart-update">
                                <div class="update-cart">
                                    Update
                                </div>
                            </div> -->

                            <div class="cart-product-remove remove-cart" id="{{$details['id']}}"  >                           
                                <div class = 'remove-product'>                             
                                    Remove
                                </div>                               
                            </div>   
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        </div>        
        @endforeach
@endif

        <!-- else if -->
    @if(session('packages'))
    <hr>
    <div class='section-title cart-body-parent-container'><h3>Packages(s)</h3></div>  
        @foreach(session('packages') as $id => $details)   
            @php
                $amt = $details['price'];
                $total += $amt;
            @endphp   
                
        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
        <div class="cart-body-parent-container">
        <div class="cart-body-left-container">
            <div class="products-cart">
                
                <p class="empty-cart-msg"></p>
                <div class="cart-product-details">
                    
                    <div class="cart-product-image">
                        <img src="{{url('mainpackages/subpackages/large',$details['image'])}}" alt="">
                    </div>

                    <div class="cart-product-info">
                        <div class="cart-product-name">
                            <h4>{{$details['name_package']}}</h4>
                        </div>
                        <input type="hidden" class="product-id" value="{{$details['id']}}">
                        <input type="hidden" class="p-price" value="{{$details['price']}}">
                        <input type="hidden" class="product-name" value="{{$details['name_package']}}">
                        <input type="hidden" class="product-image" value="{{$details['image']}}">

                        <div class="cart-product-price cart-product-details-section">
                            <p class = 'product-price'>Price: <i class="fas fa-rupee-sign"></i><span class="myPrice">{{$details['price']}}</span></p>                           
                        </div>

                        <!-- <div class="product-quantity cart-product-details-section">
                            <i class="fas fa-arrow-down quantity-decr"></i>
                            <input type="number" value="{{ $details['quantity'] }}" class="quantity update-qty" />
                            <i class="fas fa-arrow-up quantity-incr"></i>
                        </div> -->

                        <div class="cart-update-remove cart-product-details-section">
                           <!--  <div class="cart-update">
                                <div class="update-cart">
                                    Update
                                </div>
                            </div> -->

                            <div class="cart-product-remove remove-package" id="{{$details['id']}}"  >                           
                                <div class = 'remove-product'>                             
                                    Remove
                                </div>                               
                            </div>   
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        </div>        
        @endforeach


    @endif 

    
    @else
        @php
            header("Location: " . URL::to('/index'), true, 302);
            exit();
        @endphp 
    @endif
    <!-- <div class="grand-tot" value="hdjfh">{{$total}}</div>   -->
    <!-- <input type="hidden" class="grand-tot" value="{{$total}}" id="grand-tot">{{$total}} -->
    
    <input type='hidden' id="grand-tot" value = "{{$total}}" >
    <!-- <div class="ta"></div> -->
    <script>
      var el = document.getElementById("grand-tot").value;
      var gd = document.querySelector('.total-amt').innerHTML = el;
    </script>
      
   
    
    @endsection

    


