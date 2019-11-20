@extends('frontEnd.layouts.master')
@section('title','My Account Page')
@section('slider')
@endsection
@section('content')

<div class="product-main-container" id = 'target-container'>
    <div class="breadcrumbs-container">
        <div class="breadcrumbs-inner-container">
            <div class="col-left">
                <h1>Update Details</h1>
            </div>

            <div class="col-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span class = 'active-link'>MY ACCOUNT</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="">
        <div class="col-12 col-md-6 offset-md-3 acc-form" id="update-profile">
            <div class=""><!--login form-->
                <form action="{{url('/update-profile',$user_login->id)}}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{method_field('PUT')}}
                    <legend>Account Profile</legend>
                    <div class="form-group {{$errors->has('name')?'has-error':''}}">
                        <input type="text" class="form-control" name="name" id="name" value="{{$user_login->name}}" placeholder="Name">
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('address')?'has-error':''}}">
                        <input type="text" class="form-control" value="{{$user_login->address}}" name="address" id="address" placeholder="Address">
                        <span class="text-danger">{{$errors->first('address')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('city')?'has-error':''}}">
                        <input type="text" class="form-control" name="city" value="{{$user_login->city}}" id="city" placeholder="City">
                        <span class="text-danger">{{$errors->first('city')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('state')?'has-error':''}}">
                        <input type="text" class="form-control" name="state" value="{{$user_login->state}}" id="state" placeholder="State">
                        <span class="text-danger">{{$errors->first('state')}}</span>
                    </div>
                    <div class="form-group">
                        <select name="country" id="country" class="form-control">
                            @foreach($countries as $country)
                                <option value="{{$country->country_name}}" {{$user_login->country==$country->country_name?' selected':''}}>{{$country->country_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group {{$errors->has('pincode')?'has-error':''}}">
                        <input type="text" class="form-control" name="pincode" value="{{$user_login->pincode}}" id="pincode" placeholder="Pincode">
                        <span class="text-danger">{{$errors->first('pincode')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('mobile')?'has-error':''}}">
                        <input type="text" class="form-control" name="mobile" value="{{$user_login->mobile}}" id="mobile" placeholder="Mobile">
                        <span class="text-danger">{{$errors->first('mobile')}}</span>
                    </div>
                    <div class="acc-btn form-group text-center">
                        <button type="submit" class="btn btn-acc">Update Profile</button>
                    </div>

                   
                    
                </form>
            </div><!--/login form-->
        </div>
        



        <div class="col-12 col-md-6 offset-md-3 acc-form" id="update-password">
            <div class=""><!--sign up form-->
                <form action="{{url('/update-password',$user_login->id)}}" method="post" class="form-horizontal">
                    <legend>Update New Password</legend>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{method_field('PUT')}}
                    <div class="form-group {{$errors->has('password')?'has-error':''}}">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Old Password">
                        @if(Session::has('oldpassword'))
                            <span class="text-danger">{{Session::get('oldpassword')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('newPassword')?'has-error':''}}">
                        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password">
                        <span class="text-danger">{{$errors->first('newPassword')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('newPassword_confirmation')?'has-error':''}}">
                        <input type="password" class="form-control" name="newPassword_confirmation" id="newPassword_confirmation" placeholder="Confirm Password">
                        <span class="text-danger">{{$errors->first('newPassword_confirmation')}}</span>
                    </div>
                    <div class="acc-btn form-group text-center">
                        <button type="submit" class="btn btn-acc update-profile" >Update Password</button>
                    </div>
                    
                </form>
            </div><!--/sign up form-->
        </div>

        
    </div>
</div>
<div style="margin-bottom: 20px;"></div>
@endsection
<!-- 
<script src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
<script>
   $(document).ready(function(){
        $("#update-password").hide();
        $(".update-password").click(function()
        {               
            $("#update-profile").hide();
            $("#update-password").show();
        });
        $(".update-profile").click(function()
        {   
            $("#update-profile").show();
            $("#update-password").hide();

            
        });
    });
</script> -->