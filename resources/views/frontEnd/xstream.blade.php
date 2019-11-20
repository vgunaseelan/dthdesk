@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')

    <div class="banner-container xstream-page" id = 'xstream-container'>
        <div class="xstream-banner-img">
            <img src="{{asset('frontEnd/dthdesk/image/banner/xstreamslider1.jpg')}}" alt="">
        </div>
        <!--<div class="xstream-text">-->
        <!--    <h3 class="xstream-header">Don't Just Watch<br>-->
        <!--        Tv on Your Tv</h3>-->
        <!--    <p class="xstream-para">Movies, apps, games &amp; TV channels – now all on<br>-->
        <!--        your TV with Airtel Xstream Box</p>-->
        <!--        <div class="xstream-text-link">-->
        <!--            <div><a class="buy-now cursor-pointer" href="#" target="">Buy @ Rs.3999 Only</a></div>-->
        <!--            <div class="get-call cursor-pointer">Get a Call</div>-->
        <!--        </div>-->
        <!--</div>-->
        
        <div class="xstream-text">
                        <h3 class="xstream-header">Don't Just Watch<br>
                            Tv on Your Tv</h3>
                        <p class="xstream-para">Movies, apps, games &amp; TV channels – now all on<br>
                            your TV with Airtel Xstream Box</p>
                            <div><a class="buy-now cursor-pointer" href="#" target="">Buy @ Rs.3999 Only</a></div>
                            <div class="get-call cursor-pointer">Get a Call</div>
                    </div>
    </div>

    <div class="xstream-body-container">
        <div class="xstream-container-contents">
            <div class="xstream-content">
                <img src="{{asset('frontEnd/dthdesk/image/showcase/prd-1_2D721692715B7688842261474D1C60A8.jpg')}}" alt="">
            </div>

            <div class="xstream-content">
                <!--<h3 class="content-title"><i class="fas fa-check"></i>Binge big on the big screen</h3>-->
                <!--<h3 class="content-title"><i class="fas fa-check"></i>Command with your voice</h3>-->
                <!--<h3 class="content-title"><i class="fas fa-check"></i>Your apps now on tv</h3>-->
                
                <div class = content-div>
                    <div>
                        <i class="fas fa-check"></i>
                    </div>
                    
                    <div>
                        <h3 class = 'content-title'>Binge big on the big screen</h3>
                    </div>
                </div>
                
                <div class = content-div>
                    <div>
                        <i class="fas fa-check"></i>
                    </div>
                    
                    <div>
                        <h3 class = 'content-title'>Command with your voice</h3>
                    </div>
                </div>
                
                <div class = content-div>
                    <div>
                        <i class="fas fa-check"></i>
                    </div>
                    
                    <div>
                        <h3 class = 'content-title'>Your apps now on tv</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="xstream-container-contents">
            <div class="xstream-content img-container2">
                <img src="{{asset('frontEnd/dthdesk/image/showcase/prd-6_A1E630997A2D710094627DCA99CD277D.jpg')}}" alt="">
            </div>

            <div class="xstream-content">
                <!--<h3 class="content-title"><i class="fas fa-check"></i>Turn Smartphone to a remote</h3>-->
                <!--<h3 class="content-title"><i class="fas fa-check"></i>Chromecast built-in</h3>-->
                <!--<h3 class="content-title"><i class="fas fa-check"></i>Experience 4K picture quality</h3>-->
                <!--<h3 class="content-title"><i class="fas fa-check"></i>Fueled with the power of Google</h3>-->
                
                <div class = content-div>
                    <div>
                        <i class="fas fa-check"></i>
                    </div>
                    
                    <div>
                        <h3 class = 'content-title'>Turn Smartphone to a remote</h3>
                    </div>
                </div>
                
                <div class = content-div>
                    <div>
                        <i class="fas fa-check"></i>
                    </div>
                    
                    <div>
                        <h3 class = 'content-title'>Chromecast built-in</h3>
                    </div>
                </div>
                
                <div class = content-div>
                    <div>
                        <i class="fas fa-check"></i>
                    </div>
                    
                    <div>
                        <h3 class = 'content-title'>Experience 4K picture quality</h3>
                    </div>
                </div>
                
                <div class = content-div>
                    <div>
                        <i class="fas fa-check"></i>
                    </div>
                    
                    <div>
                        <h3 class = 'content-title'>Fueled with the power of Google</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="xstream-buy">
            <a href="#">Buy now</a>
        </div>
    </div>


    @endsection