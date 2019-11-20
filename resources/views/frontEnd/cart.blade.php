@extends('frontEnd.layouts.master')
@section('title','Cart Page')
@section('slider')
@endsection
@section('content')


<?php
   /*  $id = $detail_product->categories_id; 
    $categories=DB::table('categories')->where('id',$id)->first();
    $cat_id=$categories->id; */
    // echo $cat_id;    
?>

<div class="product-main-container" id = 'target-container' >
    <div class="breadcrumbs-container">
        <div class="breadcrumbs-inner-container">
            <div class="col-left">
                <h1>Shop</h1>
            </div>
            <div class="col-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li><!-- 
                        <li class="breadcrumb-item"><a href="#">Product</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page"><span class = 'active-link'>Cart</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                </div>
    @endif

<?php $i=1; ?>
    @foreach($cart_datas as $cart_data)
    <?php
        $image_products=DB::table('products')->select('image')->where('id',$cart_data->products_id)->get();        
    ?>   
    <div class="cart-body-container row">
            <div class="col-left">
                <div class='section-title'><h3>{{$i }} ) Product</h3></div>
                <p class="empty-cart-msg"></p>
                <div class="cart-product-details">                    
                    <div class="cart-product-image">
                    @foreach($image_products as $image_product)
                        <img src="{{url('products/small',$image_product->image)}}" alt="">
                    @endforeach                        
                    </div>
                    <div class="cart-product-info">
                        <div class="cart-product-name">
                            <h4>{{$cart_data->product_name}}</h4>
                        </div>
                        <div class="cart-product-price cart-product-details-section">
                            <p class = 'product-price'><i class="fas fa-rupee-sign"></i><span class="myPrice">{{$cart_data->product_price}}</span></p>
                        </div>
                        <div class="product-quantity cart-product-details-section">                            
                            <span class="quantity-select">
                                        @if($cart_data->quantity>1)
                                            <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart_data->id.'/-1')}}">
                                             <i class="fas fa-arrow-down quantity-decr"></i> </a>
                                        @endif
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart_data->quantity}}" autocomplete="off" size="2">
                                        <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart_data->id.'/1')}}"> 
                                        <i class="fas fa-arrow-up quantity-incr"></i> </a>
                                    <div class="total-price">
                                        <div class = 'product-price grand_total' value="<?php $cart_data->product_price*$cart_data->quantity; ?>">Total: <!-- <i class="fas fa-rupee-sign"></i><span class="total-amt grand"> -->
                                    {{$cart_data->product_price*$cart_data->quantity}}<!-- </span> --></div>
                                    </div>
                                    <div class="total-price">
                                        <a class="cart_quantity_delete" href="{{url('/cart/deleteItem',$cart_data->id)}}">Remove</a>
                                    </div>                                   
                            </span>                            
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        
<?php $i++; ?>
        @endforeach 
        <div class="">
                <div class='section-title'><h3>Order summary</h3></div>
                <div class="summary-details">
                    <div class="total-price">
                        <p class = 'product-price grand-sum' >Grand Total: <i class="fas fa-rupee-sign"></i><span class="total-amt"></p>
                            
                    </div>
                    
                    <div class="checkout-proceed">
                        <a href="billing.html"><div class="checkout-proceed-btn">
                            Proceed to checkout
                        </div></a>
                    </div>

                    <div class="continue-shopping">
                        <a href="#"><div class="continue-shopping-btn">
                            Continue shopping
                        </div></a>
                    </div>
                </div>
            </div>

@endsection
<script>
 window.addEventListener('load', function() {
    onload = 'cart()'/* this function calling extranel main.js file */
    }); 
</script>
<script>

</script>