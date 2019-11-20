@extends('backEnd.layouts.master')
@section('title','Customer Details')
@section('content')
<?php error_reporting(0); ?>
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="{{route('customers.create')}}" class="current">Contanct Details</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Customer Enquiery</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>                                               
                        <th>Pincode</th>
                        <th>Message</th>
                        <th>Date</th>
                   
                        
                        <!-- <th>Add Attribute</th> -->
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                  
                    @foreach($users as $user)

                    
                        <tr class="gradeC">
                            <td>{{++$j}}</td>                            
                            <td style="vertical-align: middle;">{{$user->cus_name}}</td>
                            <td style="vertical-align: middle;">{{$user->cus_email}}</td>
                            <td style="vertical-align: middle;">{{$user->cus_phone}}</td>                                                       
                            <td style="vertical-align: middle;">{{$user->cus_pincode}}</td>                            
                            <td style="vertical-align: middle;">{{$user->cus_message}}</td>
                            <td style="vertical-align: middle;">{{$user->updated_at}}</td>
                                                                                 
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="#myModal{{$user->cus_id}}" data-toggle="modal" class="btn btn-info btn-mini">View message</a>  
                                <a href="javascript:" rel="{{$user->cus_id}}" rel1="delete_enquiery" class="btn btn-danger btn-mini deleteRecord">Delete</a>                            
                            </td>
                        </tr>
                        {{--Pop Up Model for View Product--}}
                        <div id="myModal{{$user->cus_id}}" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>

                               


                                <h3>{{$user->cus_name}}  &emsp; {{$user->cus_email}}   </h3>
                                
                            </div>
                            <div class="modal-body"> 
                           
                                <p>{{$user->cus_message}}</p>
                           
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
                window.location.href=url+"/admin/"+deleteFunction+"/"+id;  /* server */
                // window.location.href="/admin/"+deleteFunction+"/"+id;  /* local */
            });
        });
    </script>
@endsection