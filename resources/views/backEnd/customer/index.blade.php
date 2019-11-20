@extends('backEnd.layouts.master')
@section('title','Customer Details')
@section('content')
<?php error_reporting(0); ?>
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="{{route('customers.index')}}" class="current">Orders Details</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Customer Address & Orders </h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Pincode</th>
                        <th>payment Way</th>
                        <th>Date</th>
                   
                        
                        <!-- <th>Add Attribute</th> -->
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                  
                    @foreach($customer as $customer)

                        @php 
                                $cus_id = $customer->id;                               
                                $packages=DB::table('orders_package')->where('customer_id',$cus_id)->count();
                                $count=DB::table('orders')->where('customer_id',$cus_id)->count();        

                                $payment=DB::table('orders')->where('customer_id',$cus_id)->first();                                    
                                $i=1;  
                                $total = 0;       
                        @endphp
                    

                        <tr class="gradeC">
                            <td>{{++$j}}</td>                            
                            <td style="vertical-align: middle;">{{$customer->name}}</td>
                            <td style="vertical-align: middle;">{{$customer->users_email}}</td>
                            <td style="vertical-align: middle;">{{$customer->mobile}}</td> 
                            <td style="vertical-align: middle;">{{$customer->address}}</td>
                            <td style="vertical-align: middle;">{{$customer->city}}</td>
                            <td style="vertical-align: middle;">{{$customer->state}}</td>
                            <td style="vertical-align: middle;">{{$customer->pincode}}</td>
                            @php if($customer->payment_method=='pod'){ $way="Pay on delivery";} elseif($customer->payment_method=='online'){ $way="Online Transaction";} else{$way="";}@endphp
                            <td style="vertical-align: middle;">{{$way}}</td>
                            <td style="vertical-align: middle;">{{$customer->created_date}}</td>                                                 
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="#myModal{{$customer->id}}" data-toggle="modal" class="btn btn-info btn-mini">View Orders</a>  
                                <a href="javascript:" rel="{{$customer->id}}" rel1="delete-customers" class="btn btn-danger btn-mini deleteRecord">Delete</a>                            
                            </td>
                        </tr>
                        {{--Pop Up Model for View Product--}}
                        <div id="myModal{{$customer->id}}" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>

                               


                                <h3>{{$customer->users_email}} 
                                 &emsp; {{$customer->mobile}}
                                 @php
                                    if($count >=1)
                                    {
                                        
                                        echo"&emsp;  Total Products:".$count;
                                    }                                
                                    
                                    if($packages >=1)
                                    {
                                        echo "&emsp; Total Packages:".$packages;
                                    }  
                                @endphp 
                                
                                </h3>
                                
                            </div>
                            <div class="modal-body"> 
                            @php   if($count >=1)  { 
                                
                                echo"<h4> Products &searr;</h4>"; 
                                $categories=DB::table('orders')->where('customer_id',$cus_id)->get();
                                @endphp
                                
                                @foreach($categories as $cus)  
                                {{$i++}} )
                                @php
                                    $amt = $cus->product_price * $cus->product_qty;
                                    $total += $amt;
                                @endphp  
                                <div class="text-center"> <img src="{{url('products/small',$cus->product_image)}}" width="100" alt="{{$cus->product_image}}"></div>
                                    <p class="text-center"><b> Product name:</b> &emsp;{{$cus->product_name}}</p> 
                                    <p class="text-center"><b> Price : </b>  &emsp;{{$cus->product_price}}</p>
                                    <p class="text-center"><b> Quantity:</b> &emsp; {{$cus->product_qty}}</p>
                                    <p class="text-center"><b> Total:  </b>  &emsp; {{$cus->subtotal}}</p> <hr>                             
                                @endforeach 

                            @php }    @endphp

                            @php  if($packages >=1)  {
                                $k=1;
                                echo"<h4> Packages &searr;</h4>";
                                    $pack_details=DB::table('orders_package')->where('customer_id',$cus_id)->get(); 
                                    foreach($pack_details as $pack_detail)
                                    {
                                        $amt = $pack_detail->product_price ;
                                        $total += $amt;
                                        echo $k++ ." )";
                                        @endphp
                                        
                                        <div class="text-center"> <img src="{{url('mainpackages/subpackages/large',$pack_detail->product_image)}}"
                                             width="100" alt="{{$pack_detail->product_image}}"></div>                                       
                                        <p class="text-center"><b> Package name:</b> &emsp;{{$pack_detail->product_name}}</p> 
                                        <p class="text-center"><b> Price : </b>  &emsp;{{$pack_detail->product_price}}</p><hr> 
                                     @php

                                    }

                            }   @endphp
                                <p class="text-center"><b> Grand Total:Rs  </b>  &nbsp; {{$total}}</p> <br> 
                            </div>
                          
                        </div>
                        {{--Pop Up Model for View Product--}}
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.tables.js')}}"></script>
    <script src="{{asset('js/matrix.popover.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Are you sure?',
                text:"You won't be able to revert this!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it!',
                cancelButtonText:'No, cancel!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href=url+"/admin/"+deleteFunction+"/"+id;      /* server */
                // window.location.href="/admin/"+deleteFunction+"/"+id;    /* local */
            });
        });
    </script>
@endsection