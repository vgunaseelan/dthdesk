@extends('frontEnd.layouts.master')
@section('title','checkOut Page')
@section('slider')
@endsection
@section('content')


<div class="product-main-container" id = 'target-container'>
    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
</div>

<div class="breadcrumbs-container">
    <div class="breadcrumbs-inner-container">
        <div class="col-left">
            <h1>Billing</h1>
        </div>

        <div class="col-right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{action('AddtocartController@create')}}">Cart</a></li>
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
        <div class = 'col-md-10'>
            <div class='section-title'><h3>Billing information</h3></div>
            <div class="billing-form-container">
                <form action="{{url('/submit-checkout')}}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group {{$errors->has('billing_name')?'has-error':''}}">
                        <input type="text" name="billing_name" value="{{$user_login->name}}" placeholder = 'Fullname. . .' class = 'form-control' >
                        <span class="text-danger">{{$errors->first('billing_name')}}</span>
                    </div>


                    <div class="form-group {{$errors->has('billing_mobile')?'has-error':''}}">
                        <input type="text" name="billing_mobile" value="{{$user_login->mobile}}" placeholder = 'Mobile no. . .' class = 'form-control'>
                        <span class="text-danger">{{$errors->first('billing_mobile')}}</span>
                    </div>

                    <div class="form-group {{$errors->has('billing_email')?'has-error':''}}">
                        <input type="email" name="billing_email" value="{{$user_login->email}}" placeholder = 'Email. . .' class = 'form-control'>
                        <span class="text-danger">{{$errors->first('billing_email')}}</span>
                    </div>

                    <div class="form-group {{$errors->has('billing_address')?'has-error':''}}">
                        <input type="text" name="billing_address" value="{{$user_login->address}}" placeholder = 'Address. . .' class = 'form-control'>
                        <span class="text-danger">{{$errors->first('billing_address')}}</span>
                    </div>

                    <div class="row">
                        <div class="col-md-4 form-group pr-1 {{$errors->has('billing_city')?'has-error':''}}">
                            <input type="text"  name="billing_city" value="{{$user_login->city}}"  placeholder="City. . ." class = 'form-control'>
                            <span class="text-danger">{{$errors->first('billing_city')}}</span>
                        </div>
                            
                        <div class="col-md-4 form-group pr-1 {{$errors->has('billing_state')?'has-error':''}}">
                            <input type="text"  name="billing_state" value="{{$user_login->state}}"  placeholder="State. . ." class = 'form-control'>
                            <span class="text-danger">{{$errors->first('billing_state')}}</span>
                        </div>
                            
                        <div class="form-group col-md-4 {{$errors->has('billing_pincode')?'has-error':''}}">
                            <input type="text" name="billing_pincode" value="{{$user_login->pincode}}" id="billing_pincode"  placeholder = 'Postal code. . .' class = 'form-control'>
                            <span class="text-danger">{{$errors->first('billing_pincode')}}</span>
                        </div>
                    </div>
                            
                    <div class="payment-method">
                        <div class='section-title'><h3>Payment method</h3></div>
                        <p class="payment-choose">Select how you'd like to pay</p>
                        <div class="payment-form-container {{$errors->has('payment_method')?'has-error':''}}">
                            <div class="form-group">
                                <input type="radio" name="payment_method" id="" value="online"> Online payment
                            </div>

                            <div class="form-group">
                                <input type="radio" name="payment_method" id="" value="pod"> Pay on delivery
                            </div>
                        </div>
                        <span class="text-danger">{{$errors->first('payment_method')}}</span>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
                            
    <!-- third section -->
    <div class="col-md-4 col-right">
        <div class='section-title'><h3>Cart summary</h3></div>
        @if(session('cart') || session('packages'))
            @php 
                $total = 0;
                $qty = 0;
                
            @endphp    
            @if(session('cart'))

            <div class='section-sub-title mt-3'><h3>Product</h3></div>
            @foreach(session('cart') as $id => $details)   
                @php
                    $amt = $details['price'] * $details['quantity'];
                    $qtycount = $details['quantity'];
                    $total += $amt;
                    $qty += $qtycount;
                @endphp         

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
                            <p>Qty: {{$details['quantity']}}</p>
                        </div>

                        <div class="cart-item-price">
                            <p class = 'cart-price'><i class="fas fa-rupee-sign"></i>{{$details['price']}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

            @if(session('packages'))

            <div class='section-sub-title mt-5'><h3>Packages</h3></div>
            @foreach(session('packages') as $id => $details)
                @php
                    $amt = $details['price'];               
                    $total += $amt;   
                    $packcount = Session::get('packages');
                    $pack_tot = count($packcount);           
                @endphp         
        
            <div class="cart-summary-container">
                <div class="cart-summary-inner-container">
                    <div class="cart-item">
                        <div class="cart-item-pic">
                            <img src="{{url('mainpackages/subpackages/large',$details['image'])}}" alt="">
                        </div>
                    </div>

                    <div class="cart-item-price-container float-cont">
                        <div class="cart-item-name">
                            <p>{{$details['name_package']}}</p>                               
                        </div>

                        <div class="cart-item-price">
                            <p class = 'cart-price'><i class="fas fa-rupee-sign"></i>{{$details['price']}}</p>
                        </div>
                    </div>
                </div>
            </div>
                
                   
                            
               
                @endforeach
        @endif

            <div class="cart-summary-inner-container subtotal">
                <div class="sub-total">
                    @if(session('cart'))
                        <p>Total Product Quantity</p>
                    @endif
                    @if(session('packages'))
                        <p>Total Packages </p>
                    @endif
                        <p>Subtotal</p>
                        <p class = 'ship'>Shipping</p>
                </div>

                <div class="sub-total-price float-cont">
                    @if(session('cart'))
                        <p class = 'cart-price'>{{ $qty }}</p>
                    @endif
                    @if(session('packages'))
                        <p class = 'cart-price'>{{ $pack_tot }}</p>
                    @endif
                    
                    <p class = 'cart-price'><i class="fas fa-rupee-sign"></i>{{ $total }}</p>
                    <p class = 'cart-price ship'><i class="fas fa-rupee-sign"></i>0</p>
                </div>
            </div>
        
            
        <div class="cart-summary-inner-container grandtot">
            <div class="cart-grand-total">
                <p>Grand Total</p>
            </div>

            <div class = 'float-cont'>
                <p class = 'cart-price'><i class="fas fa-rupee-sign"></i>{{ $total }}</p>
            </div>
        </div>
            

        <div class="order-place">
            <button type="submit" class="btn btn-primary" style="float: right;">Place your order</button>
        </div>

        </form>
    </div> 
</div>

@else
         @php
            header("Location: " . URL::to('/index'), true, 302);
            exit();
        @endphp
   
@endif

@endsection
