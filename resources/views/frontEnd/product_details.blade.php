@extends('frontEnd.layouts.master')
@section('title','Detial Page')
@section('slider')
@endsection
@section('content')

<?php
    $id = $detail_product->categories_id; 
    $categories=DB::table('categories')->where('id',$id)->first();
    $cat_id=$categories->id;
    // echo $cat_id;    
?>

<div class="product-main-container" id = 'target-container'>
    <div class="breadcrumbs-container">
        <div class="breadcrumbs-inner-container">
            <div class="col-left">
                <h1>Shop</h1>
            </div>
            <div class="col-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{action('IndexController@index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span class = 'active-link'>Product</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


        <div class="product-container">
            <div class="product-inner-container">
                <div class="product-image-container">
                    <div class=""><!-- product-image -->
                        <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                            <a href="{{url('products/large',$detail_product->image)}}">
                                <img src="{{url('products/small',$detail_product->image)}}" alt="" id="dynamicImage"/>
                            </a>
                         </div>
                        <ul class="thumbnails" style="margin-left: -10px; ">
                            <li style="list-style:none;">
                                @foreach($imagesGalleries as $imagesGallery)
                                    <a href="{{url('products/large',$imagesGallery->image)}}" data-standard="{{url('products/small',$imagesGallery->image)}}">
                                        <img src="{{url('products/small',$imagesGallery->image)}}" alt="" width="75" style="padding: 8px;">
                                    </a>
                                @endforeach
                            </li>
                        </ul> 

                    </div>
                </div>              
               

                    
                
            <!-- <div class="product-details"> -->
                <div class="product-details-container">
                <!-- <img src="{{asset('frontEnd/images/product-details/new.jpg')}}" class="newarrival" alt="" /> -->
                    <h3 class="product-name">{{$detail_product->p_name}}</h3>
                    <!-- <p>Code ID: {{$detail_product->p_code}}</p> -->
                    <div class="product-price-rating">                    
                        <div class="product-price">
                                @php
                                    $price = $detail_product->old_price;
                                @endphp                               
                                @if ($price>0)

                            <p>
                                <span class="striked-price"><i class="fas fa-rupee-sign"></i>{{$detail_product->old_price}}</span>
                                @endif
                                <span class="display-price"><i class="fas fa-rupee-sign"></i>{{$detail_product->price}} </span><br>
                                @if ($detail_product->p_code>0)
                                    Coupon Code :<span class=""><i class=""></i>{{$detail_product->p_code}} </span>
                                @endif
                             </p>
                        </div>
                        
                        <!-- <div class="product-rating">
                            <i class="far fa-star color"></i>
                            <i class="far fa-star color"></i>
                            <i class="far fa-star color"></i>
                            <i class="far fa-star color"></i>
                            <i class="far fa-star"></i>
                            <span class = 'customer-review'>(1 customer review)</span>
                        </div> -->  <!-- this wwe will use in feture -->
                    </div>

                    <div class="product-buy">
                        <div class="product-quantity">
                        @if(Session::has('message'))
                                <div class="alert alert-success text-center" role="alert">
                                {{Session::get('message')}}
                                </div>                                
                                @endif
                          
                            @if($totalStock>0)
                                <form  method="post" role="form">                               
                                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                @csrf
                                <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                                <input type="hidden" name="product_name" value="{{$detail_product->p_name}}" class="product_name">
                                <input type="hidden" name="product_image" value="{{$detail_product->image}}" class="product_image">
                                <input type="hidden" name="product_price" id="price" value="{{$detail_product->price}}" class="product_price">
                                <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                                <span class="category-head">Quantity: </span><input type="number" class="quantity-select" id="quantity" value="1" min="1" max="{{$totalStock}}"                                                               
                                      name="quantity" onclick="calling()">
                            @endif
                            
                        </div>

                        <div class="product-cart" >
                            @if($totalStock>0)
                            <div id="{{$detail_product->id}}" class="addtocart">
                                <div class="product-add-cart">
                                    <i class="fas fa-shopping-cart mr-3" ></i>Add to cart
                                </div>
                            </div>                            
                            @else
                                <i class="text-info">We Will Launch this Product as soon as !</i>
                            @endif                            
                        </div>
                    </div>

                    <div class="product-category">
                       <b id="update_price">Total Price :<input id="updateprice" name="update_price" value="" class="quantity-select total-price" readonly></b>
                        <p class="product-category-type">
                            <span class="category-head">Product: <span class="quantity-select"><?php echo " ".$categories->name; ?>  </span></span></p>
                        <!-- {{$id}} -->
                        <span class="category-head">Total Product:</span> <span class="quantity-select">{{$totalStock}}</span><br>                         

                        <p><span class="category-head">Availability:</span>
                            @if($totalStock>0)
                                <span id="availableStock" class="quantity-select">In Stock</span>
                            @else
                                <span id="availableStock" class="quantity-select">Out of Stock</span>
                            @endif
                        </p>                        
                        
                    </div>
                    
                    <div class="product-description">
                        <span class="description-title desc-title show">Description</span>
                        <span class="description-title additional-info">Additional Information</span>
                    </div>

                    <div class="product-description-details" id = 'desc-content'>
                        <h3 class="description-head">Product Description</h3>
                        <?php  $mydesc = $detail_product->description ; ?>                 
                        <p class="description-content"> <?php echo $mydesc; ?></p>
                    </div>
                    
                    <div class="product-description-details" id = 'addition-info-content' style = 'display:none'>
                        <h3 class="description-head">Additional Information</h3>
                        <div class="table-responsive-md add-info-table">
                            <table class="table table-bordered table-striped">
                                                                                         
                                <?php   foreach ($add  as $key => $value) {           
                                $d = json_encode($value);
                                $json = json_decode($d, true);
                                foreach($json as $key => $val) {
                                    if($key=="id")
                                    {
                                      unset($val);
                                    }
                                    else if($key=="products_id")
                                    {
                                      unset($val);
                                    } 
                                    else if($key=="created_at")
                                    {
                                      unset($val);
                                    }
                                    else if($key=="updated_at")
                                    {
                                      unset($val);
                                    }
                                    else
                                    {
                                        echo"<tr>";
                                        echo "<th>".ucfirst($key)."</th>";
                                        echo "<td>".$val."</td></tr>";
                                        $name=$key;
                                        $val2=$val;
                                        echo'<input type="hidden" name="'.$name.'" value="'.$val2.'">';
                                      
                                    }
                                    
                                }
                                }
                                ?>   
                            </table>
                          </div>
                          </form>
                    </div>
                </div>
            <!-- </div> -->
        </div>


        <div class="other-products-container">
            <div class="other-products-inner-container">
                <h1 class="other-products-title">Other Products</h1>
                <?php  
                   $categories=DB::table('products')->where('categories_id',$cat_id)->get();
                ?>
                   <div class="other-products">
                @foreach($categories as $rel_products)
             
                    <a href="{{url('/product-detail',$rel_products->id)}}">
                        <div class="other-product">
                            <div class="other-product-image-container">
                                <img src="{{url('products/small/',$rel_products->image)}}" alt="">                               
                            </div>
                                
                            <p class="other-product-desc">{{$rel_products->p_name}}</p>
                            <div class="other-product-price-cart">
                                <div class="other-product-price">
                                    @php
                                    $price = $rel_products->old_price;                         
                                    @endphp                               
                                    @if ($price>0) 
                                    
                                    <span class = 'other-product-desc-price mrp'><i class="fas fa-rupee-sign"></i>{{$rel_products->old_price}}</span>
                                    @endif                        
                                    <span class = 'other-product-desc-price'><i class="fas fa-rupee-sign"></i>{{$rel_products->price}}</span>
                                    
                                </div>
                            </div>                        
                        </div>
                    </a>
                                
                    @endforeach
    
                     
                    </div>
                </div>
            </div>
        </div>


    
 
@endsection
<script>
    window.addEventListener('load', function() {
        product();/* this function calling extranel main.js file */
    }); 
</script>
<script>
window.addEventListener('load', function() {
    calling(); /* this function calling below */
});
function calling(){
    // alert("hi");
    var p =document.getElementById('price').value;
    var q =document.getElementById('quantity').value;
    var total_price = parseInt(q * p);   
    // alert(typeof(total_price));
    document.getElementById("updateprice").value=total_price;
   
    // alert(total_price);

}

</script>
