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
        <div class="col-md-" id="login-form">
            <div class=""><!--login form-->
                <h4 class = 'text-center login-header'>Login to your account!</h4><br>
                
                <form action="{{url('/user_login')}}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <input type="email" placeholder="Email" name="email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password" class="form-control"/>
                    </div>
                    <div class="form-group login-inline">
                        <div>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </div>
                        <div>
                           <a href="{{action('UsersController@signup')}}" class="signup-create">Create account</a>
                        </div>
                    </div>
                    <div class="form-group login-submit">
                        <button type="submit" class="btn btn-success btn-md">Login</button>
                    </div>
                </form>
            </div><!--/login form-->
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