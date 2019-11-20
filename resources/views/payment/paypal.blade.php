@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')

@if(session('cart'))
        @php 
            $total = 0;
            $qty = 0;
            
        @endphp
        @foreach(session('cart') as $id => $details)  
            @php
                $amt = $details['price'] * $details['quantity'];
                $qtycount = $details['quantity'];
                $total += $amt;
                $qty += $qtycount;
            @endphp 
        @endforeach

<div class="product-main-container" id = 'target-container'>
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
                        <li class="breadcrumb-item"><a href="#">Online pay</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="text-center">YOUR ORDER HAS BEEN PLACED</h3>      <br>
        <p class="text-center">Your order number is <b>{{$who_buying->users_id}}</b> and total payment is <b>Rs. {{$total}}</b> </p>
        <p class="text-center">Please make payment by clicking on below Payment Button </p>
        <br>
        <div class="text-center">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="xxxx@gmail.com">
            <input type="hidden" name="item_name" value="Buyer ({{$who_buying->name}})">
            <input type="hidden" name="amount" value="{{$total}}">
            <input type="hidden" name="currency_code" value="USD">
            <input type="image" name="submit"
                   src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                   alt="PayPal - The safer, easier way to pay online">
        </form>
        </div>
    </div>
    <div style="margin-bottom: 250px;"></div>
</div>
@endif
@endsection