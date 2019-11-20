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


    <div class="main-contaniner channels-container" id="channels-container">
            <!--new  section start -->
                @foreach($sub_packages as $sub_package)
                    <h1 class="channel_head">{{ucfirst($sub_package->sub_pack_name)}}</h1>
                    <p class="text-center para"><b>@php echo $sub_package->sub_pack_description; @endphp</b></p><br>
                    <p class="text-center para">₹ {{$sub_package->per_month}}</p>
                @endforeach
                <section class="brand_section">           
                    <div class="channel-list">
                   
                @if(count($groupchannels)>0)
               
                  @foreach($groupchannels as $idvalues)
                   
                            @php
                                
                                 $channel_name = $idvalues->ch_lang_name;                             
                                 
                                 $ch_names = DB::table('language_channels')->where('lang_id','=',$channel_name)->first();
                            @endphp                             
                               
                                <div class="channel-types text-center">   
                                <h4 class="h4style"><b>{{ucfirst($ch_names->channel_title)}}</b></h4>
                                </div>

                                <div class="channel-group">                                                    
                                    <div class="channel-item"> 
                                        <figure>
                                        <div class = 'item-img'>
                                            <?php
                                            $img = explode("|",$idvalues->ch_image);
                                            for($i=0;$i<=count($img);$i++)
                                            {  ?>
                                                
                                                <div class = 'item-img-div'>
                                                <img src="{{asset('channels/large/'.$img[$i])}}" alt="">
                                           
                                                <?php
                                                    $cut= explode(".",$img[$i],4);                                          
                                                    echo "<p class = 'channels-name'>".strtoupper($cut[2])."</p>";
                                                ?>
                                                </div>
                                                
                                            <?php  } ?> 
                                            </div> 
                                            <figcaption class="channel-name">
                                            </figcaption>
                                               
                                        </figure>             
                                    </div>
                            </div>

                  @endforeach()
                @else
                        <!-- <h3 class="text-center">We Will Soon Be Launching.....</h3> -->
                        <div class="text-center">
                            <img src="{{asset('frontEnd/dthdesk/image/soon.jpg')}}" alt="" class="img-responsive">
                        </div>
                @endif


                    </div>
                </section>          
  </div>

    @endsection
    <script  src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
    <script>
    $(document).ready(function () {
        // Handler for .ready() called.
        $('html, body').animate({
            scrollTop: $('#channels-container').offset().top
        },1);
    });
</script>