@extends('frontEnd.layouts.master')
@section('title','Detial Page')
@section('slider')
@endsection
@section('content')

<div class="product-main-container" id = 'target-container'>

    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
<div class="breadcrumbs-container">
    <div class="breadcrumbs-inner-container">
        <div class="col-left">
            <h1>Billing</h1>
        </div>

        <div class="col-right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class = 'active-link'>Billing</span></li>
                    <li class="breadcrumb-item"><a href="#">Payment</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- second section -->
<div class="billing-body-container row">
    <div class="col-md-8 col-left pr-3">
        <div class='section-title'><h3>Billing information</h3></div>
        <div class="billing-form-container">
            <form action="">
                <div class="form-group">
                    <input type="text" placeholder = 'Fullname. . .' class = 'form-control'>
                </div>

                <div class="form-group">
                    <input type="text" placeholder = 'Mobile no. . .' class = 'form-control'>
                </div>

                <div class="form-group">
                    <input type="email" placeholder = 'Email. . .' class = 'form-control'>
                </div>

                <div class="form-group">
                    <input type="text" placeholder = 'Address. . .' class = 'form-control'>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group pr-1">
                    <input type="text" placeholder = 'Address. . .' class = 'form-control'>
                        <!-- <select name="" id="" class = 'form-control'>
                            <option value="" default>City</option>
                        </select> -->
                    </div>

                    <div class="col-md-4 form-group pr-1">
                    <input type="text" placeholder = 'Address. . .' class = 'form-control'>
                        <!-- <select name="" id="" class = 'form-control'>
                            <option value="" default>State</option>
                        </select> -->
                    </div>

                    <div class="form-group col-md-4">
                        <input type="text" placeholder = 'Postal code. . .' class = 'form-control'>
                    </div>
                </div>

            </form>

            <div class="payment-method">
                <div class='section-title'><h3>Payment method</h3></div>
                <p class="payment-choose">Select how you'd like to pay</p>
                <div class="payment-form-container">
                    <div class="form-group">
                        <input type="radio" name="pay-type" id=""> Online payment
                    </div>

                    <div class="form-group">
                        <input type="radio" name="pay-type" id=""> Pay on delivery
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- third section -->
<div class="col-md-4 col-right">
                <div class='section-title'><h3>Cart summary</h3></div>
@if(session('cart'))
    @php 
        $total = 0;
        $i=1; 
    @endphp
    @foreach(session('cart') as $id => $details)   
        @php
            $amt = $details['price'] * $details['quantity'];
            $total += $amt;
        @endphp         
    <div class='section-title'><h3>{{$i}} )Product</h3></div>
        <div class="cart-summary-container">
                <div class="cart-summary-inner-container">
                    <div class="cart-item">
                        <div class="cart-item-pic">
                            <img src="{{url('products/small',$details['image'])}}" alt="">
                        </div>
                    </div>

                    <div class="cart-item-price-container float-cont">
                        <div class="cart-item-name">
                            <p>{{$details['name_product']}}</p>
                        </div>

                        <div class="cart-item-price">
                            <p class = 'cart-price'><i class="fas fa-rupee-sign"></i>{{$details['price']}}</p>
                        </div>
                    </div>
                </div>

                <div class="cart-summary-inner-container subtotal">
                    <div class="sub-total">
                        <p>Quantity</p>
                        <p>Subtotal</p>
                        <!-- <p class = 'ship'>Shipping</p> -->
                    </div>

                    <div class="sub-total-price float-cont">
                        <p class = 'cart-price'>{{ $details['quantity'] }}</p>
                        <p class = 'cart-price'><i class="fas fa-rupee-sign"></i>{{ $details['price'] * $details['quantity'] }}</p>
                        <!-- <p class = 'cart-price ship'><i class="fas fa-rupee-sign"></i>0</p> -->
                    </div>
                </div>
            </div>
            <div class="cart-product-remove remove-cart" id="{{$details['id']}}"  >                           
                <div class = 'remove-product'>                             
                    Remove
                </div>                               
            </div> 
            @php 
            $i++;
            @endphp
            <hr>
            @endforeach
            
            <div class="cart-summary-inner-container grandtot">
                <div class="cart-grand-total">
                    <p>Total</p>
                </div>

                <div class = 'float-cont'>
                    <p class = 'cart-price'><i class="fas fa-rupee-sign"></i>{{ $total }}</p>
                </div>
            </div>
            <hr>

            <div class="order-place">
                <a href="final.html"><div class="order-place-btn">
                    Place your order
                </div></a>
            </div>
        </div>        
    </div>

</div>
@else
         @php
            header("Location: " . URL::to('/index'), true, 302);
            exit();
        @endphp
   
@endif
@endsection

