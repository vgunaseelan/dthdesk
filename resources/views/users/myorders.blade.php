@extends('frontEnd.layouts.master')
@section('title','Cart Page')
@section('slider')
@endsection
@section('content')


<?php
   
?>

<div class="product-main-container" id = 'target-container' >
    <div class="breadcrumbs-container">
        <div class="breadcrumbs-inner-container">
            <div class="col-left">
                <h1>My Orders</h1>
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

    @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                </div>
    @endif
    
    <div class="container-fluid main-contaniner">
        
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                
            </div>
    @if($productscount >=1)
            <div class="widget-content nopadding">
            <h3 class = 'table-head'>Products</h3>
            <div class="table-responsive">
                <table class="table table-bordered data-table">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <!-- <th>Image</th> -->
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>                   
                        <th>Payment Way</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        
                    @foreach($products as $product)
                    @php
                        if($product->payment_method =='pod')
                        {
                            $way ="Pay on delivey";
                        }
                        elseif($product->payment_method =='online')
                        {
                            $way ="Online";
                        }
                        else
                        {
                            $way="";
                        }
                    @endphp
                    <tr>
                        <td>{{++$i}}</td>
                        <!-- <td><img src="{{url('products/small',$product->product_image)}}" width="100" alt="{{$product->product_image}}"></td> -->
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->product_qty}}</td>
                        <td>{{$product->subtotal}}</td>
                        <td>{{$way}}</td>
                        <td>{{$product->updated_at}}</td>
                        <td><a href="{{url('myordersdelete',$product->id)}}" class="btn btn-danger">Delete</a></td>                       
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
    @endif
    @if($packagescount >=1)
            <!-- packages -->
            <br><div class="widget-content nopadding">
            <h3 class = 'table-head'>Packages</h3>
            <div class="table-responsive">
                <table class="table table-bordered data-table">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <!-- <th>Image</th> -->
                        <th>Name</th>
                        <th>Price</th>                      
                        <th>Payment Way</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                   
                    <tbody>
                     @foreach($packages as $package)
                        @php
                            if($package->payment_method =='pod')
                            {
                                $way ="Pay on delivey";
                            }
                            elseif($package->payment_method =='online')
                            {
                                $way ="Online";
                            }
                            else
                            {
                                $way="";
                            }
                        @endphp
                        <td>{{++$i}}</td>
                        <!-- <td><img src="{{url('mainpackages/subpackages/small',$package->product_image)}}" width="100" alt="{{$package->product_image}}"></td> -->
                        <td>{{$package->product_name}}</td>
                        <td>{{$package->product_price}}</td>   
                                          
                        <td>{{$way}}</td>
                        <td>{{$package->updated_at}}</td>
                        <td><a href="{{url('myordersdelete',$package->id)}}" class="btn btn-danger">Delete</a></td>
                        
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        @endif



        @if($packagescount==0 && $productscount==0)
        <div class="text-center">
            <img src="{{asset('frontEnd/dthdesk/image/dropbox.png')}}" height="250" width="300" alt="" class="img-responsive">
            <h3 class="text-center">Empty!</h3>
        </div>

        @endif
        </div>
    </div>
    </div>
@endsection