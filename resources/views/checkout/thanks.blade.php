@extends('frontEnd.layouts.master')
@section('title','Thanks')
@section('slider')
@endsection
@section('content')
<?php 
error_reporting(0);
?>
<div class="product-main-container" id = 'target-container'>
<div class="breadcrumbs-container">
            <div class="breadcrumbs-inner-container">
                <div class="col-left">
                    <h1>Thank You!</h1>
                </div>

                <div class="col-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Cart</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span class = 'active-link'>Order placed</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</div>

<div class="final-body-container">
    <div class="final-message">
        <p class = 'final-text'>Thank you! Your order has been placed.</p>
        <p>Our agent will get in touch with you shortly!</p>
        <p>Your address =>
        @foreach($data as $value)
             {{$value}}&emsp;
        @endforeach
        @if(session('cart') || session('packages'))
            {{Session::forget('cart') }}
            {{Session::forget('packages') }}
        @endif
        </p>
    </div>
</div>
<div>
   
</div>
@endsection