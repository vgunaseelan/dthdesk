@extends('frontEnd.layouts.master')
@section('title','Login Register Page')
@section('slider')
@endsection
@section('content')


<div class="product-main-container" id = 'target-container'>
    <div class="breadcrumbs-container">
        <div class="breadcrumbs-inner-container">
            <div class="col-left">
                <h1>Cart</h1>
            </div>

            <div class="col-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{action('IndexController@index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span class = 'active-link'>Login </span></li>
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
    
    <div class="login-form-container col-md-6 offset-md-3">  
      <!--   <div class="median">
            <h4 class="or">OR</h4>
        </div> -->

        <div class="col-md-" id="signup-form">
            <div class=""><!--sign up form-->
                <h4 class = 'text-center login-header'>New User Signup!</h4> <br>
                <form action="{{url('/register_user')}}" method="post" class="form-horizontal">               
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group">
                    <input type="text" placeholder="Name" name="name" value="{{old('name')}}" class="form-control" />
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Email Address" name="email" value="{{old('email')}}" class="form-control" />
                    <span class="text-danger">{{$errors->first('email')}}</span>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" name="password" value="{{old('password')}}" class="form-control"/>
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Confirm Password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control"/>
                    <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                </div>
                <div class="form-group login-submit">
                    <button type="submit" class="btn btn-primary btn-md">Signup</button>
                    
                </div>

                <a href="{{action('UsersController@index')}}" class='login-create'><p class = 'text-center mt-4'>Already have an account?</p></a>
                
                </form>
            </div><!--/sign up form-->
        </div>
    </div>
</div>
    <!-- <div style="margin-bottom: 20px;"></div> -->
@endsection
<!-- <script src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
<script>
   $(document).ready(function(){
        $("#signup-form").hide();
        $(".signup-create").click(function()
        {   
            $("#login-form").hide();
            $("#signup-form").show();
        });
        $(".login-create").click(function()
        {   
            $("#login-form").show();
            $("#signup-form").hide();
        });
    });
</script> -->