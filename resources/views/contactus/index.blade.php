@extends('frontEnd.layouts.master')
@section('title','Contact Us Page')
@section('slider')
@endsection
@section('content')

<div class="product-main-container" id = 'target-container'>
    <div class="breadcrumbs-container">
        <div class="breadcrumbs-inner-container">
            <div class="col-left">
                <h1>Contact Us</h1>
            </div>

            <div class="col-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{action('IndexController@index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span class = 'active-link'>Get In Touch</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container"> -->
    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    <body>
        
    
    <div class="contact-container">
		<section class="section1">
			<!-- <div class="sec1title">
				<h1>Get in touch</h1>
			</div>	 -->
		</section>
		<section class="section2"> 
			<div class="contactforms">
			<!-- <h5>Drop us a line...</h5> -->
				<form action="#" class="form-horizontal">
					<label for="firstname" class="form-group">
						<i class="cntfrmicn fa fa-user"></i>
						<input name="firstname" class="form-fields form-control" type="text">
					</label>
					<label for="email" class="form-group">
						<i class="cntfrmicn fa fa-envelope"></i>
						<input name="email" class="form-fields form-control" type="text">
					</label>
					<label for="contact" class="form-group">
						<i class="cntfrmicn fa fa-phone"></i>
						<input name="contact" class="form-fields form-control" type="text">
					</label>
					<label for="textarea" class="form-group">
						<i class="cntfrmicn fa fa-comment"></i>
						<textarea class="form-fields form-control" name="textarea" id="" cols="30" rows="10"></textarea>
					</label>
					<button class="form-fields button" value="Send" type="submit">Send <i class="fa fa-paper-plane"></i></button>
				</form>
			</div>
			<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div class="contmap" style='overflow:hidden;height:738px;width:100%;'><div id='gmap_canvas' style='height:100%;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://freedirectorysubmissionsites.com/">free web directories</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(19.075314480255834,72.88153973865361),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(19.075314480255834,72.88153973865361)});infowindow = new google.maps.InfoWindow({content:'<strong>My Location</strong><br>mumbai<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
		</section>
	</div>
    </body>
<!-- </div> -->
    
@endsection