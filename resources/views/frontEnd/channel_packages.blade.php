@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')

@php
    error_reporting(0);
@endphp
    <div class="banner-container" id = 'target-container'>
        <div id="myCarousels" class="carousel slide carousel-fade" data-ride="carousel" data-interval = '7000' data-pause = false>
            <ol class="carousel-indicators">
                <li data-target="#myCarousels" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousels" data-slide-to="1"></li>
                <li data-target="#myCarousels" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active slider1">
                    <img src="{{asset('frontEnd/dthdesk/image/banner/slider1.png')}}" alt="">
                </div>
                <div class="carousel-item slider2">
                    <img src="{{asset('frontEnd/dthdesk/image/banner/slider3.jpg')}}" alt="">
                </div>
                <div class="carousel-item slider3">
                    <img src="{{asset('frontEnd/dthdesk/image/banner/slider2.png')}}" alt="">
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousels" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousels" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <div class="main-contaniner" id = 'package-container-a'>
    

            <section class="brand_section" id="pack">
                <h1 class="offerce_head packages-title">Popular Packages</h1>
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="brand-list">
                    <div class="brand-types">
                    @foreach($packages as $package)
                    <a href="{{url('channelpackages',$package->p_id)}}">                   
                        <div class="Package {{$package->p_id==$menu_active? ' active':''}}" data-id="{{$package->p_id}}"
                         id="{{strtolower($package->pack_name)}} pack"  >                            
                             {{$package->pack_name}} Packages 
                        </div>
                    </a>
                    @endforeach
                    </div>
                </div>
   

    
                <div class="brand-group packages-details">               
                
                @foreach($subpackages as $subpackage) 
                                     

                    <div class="brand-item"> 
       
                     <form  method="post" role="form">                               
                        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                        @csrf
                        <figure>
                            <div class = 'item-img'>                            
                                <img src="{{url('mainpackages/subpackages/large',$subpackage->sub_pack_image)}}" alt=""> 
                            </div>
                            
                            <figcaption class="pack-caption package-name">{{$subpackage->sub_pack_name}}</figcaption>
                            <p><span class="month-off">{{$subpackage->per_month}}</span><br>
                            <span class="channel">{{$subpackage->sub_pack_description}}</span></p>  
                            <div class="prices">
                                <span class="mrp"><i class="fas fa-rupee-sign"></i>{{$subpackage->old_price}}</span>
                                <span class="actual-price"><i class="fas fa-rupee-sign"></i>{{$subpackage->new_price}}</span>  
                            </div>                      
                            <div class="btn-group">
                                <a class="buy2"> 
                                    <div class="buy addpackage"  id="{{$subpackage->sub_id}}" package_name="{{$subpackage->sub_pack_name}}"
                                    package_image="{{$subpackage->sub_pack_image}}" package_price="{{$subpackage->new_price}}"  
                                    package_month="{{$subpackage->per_month}}" package_desc="{{$subpackage->sub_pack_description}}"  >Buy now
                                    </div>
                                </a>

                                <a href="{{url('channelList',$subpackage->sub_id)}}">
                                    <div class="channels">
                                         Channels
                                    </div>
                                </a>
                            </div>
                        </figure>
                        </form>             
                    </div>
                @endforeach

  
                </div>
        </section>
    
    </div>

@endsection
<script  src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#pack').offset().top
    },0.5);
});
</script>


<!-- <script>
$(document).ready(function()
{
    $(".Package").click(function(){
        var dataId = $(this).attr("data-id");
       
        $.ajax({
               
               type:'post',
               url:'/channelpackages',
               dataType: 'JSON',
               data:{
                        _token: $("#csrf").val(),
                            id:dataId
                    },
               success:function(data) {
                   if(data.success==true)
                   {
                 
                    var len = data.data.length;                   
                    var opt="";
                    for(var i=0; i<len; i++){

                        var sub_id = data.data[i].sub_id;                       
                        var pack_id = data.data[i].packages_id;
                        var sub_pack_name = data.data[i].sub_pack_name;
                        var sub_per_month = data.data[i].sub_per_month;
                        var sub_pack_image = data.data[i].sub_pack_image;
                        var per_month = data.data[i].per_month;
                        var sub_pack_desc = data.data[i].sub_pack_description;
                        var old_price = data.data[i].old_price;
                        var new_price = data.data[i].new_price;
                        var srcimg ="";
                        var myImg = "{{url('mainpackages/subpackages/large,"+sub_pack_image+"')}}";
                        $(".setimg").src=myImg;
                       
               opt += "<div class='brand-item'>"+
                        "<figure>"+
                            "<div class = 'item-img'>"
                                +"<img src='' class='setimg'>"
                            +"</div>"
                            +"<figcaption class='pack-caption package-name'>"+sub_pack_name+"</figcaption>"
                            +"<p><span class='month-off'>"+per_month
                            +"</span><br>"
                            +"<span class='channel'>"+sub_pack_desc+"</span>"
                            +"</p>"
                            +"<div class='prices'>"
                                +" <span class='mrp'><i class='fas fa-rupee-sign'></i>"+old_price
                                +"</span>"+"<span class='actual-price'><i class='fas fa-rupee-sign'></i>"+new_price
                                +"</span>"
                            +" </div>"
                            +"<div class='btn-group'><div class='buy'>"
                                +"<a href='#'>Buy now</a></div>"
                                +"<div class='channels'>"
                                +"</div>"
                            +"</div>"
                            +"</figure>"
                    +"</div>";
                    
            }
            $(".packages-details").html(opt); 

                   }
               
                
               }
            });
    });
    
  
});
</script> -->