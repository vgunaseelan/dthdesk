@extends('backEnd.layouts.master')
@section('title','List Sub packages')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="{{route('languageType.index')}}" class="current">List Type Channels</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List Type Channels</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Channel Title</th>                                               
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($LanguageChannels as $LanguageChannels)
                        <?php $i++; ?>
                        <tr class="gradeC">
                            <td>{{$i}}</td>
                           
                            <td style="vertical-align: middle;">{{ucfirst($LanguageChannels->channel_title)}}</td>
                                                     
                            <td style="text-align: center; vertical-align: middle;">                                
                                <a href="{{route('languageType.edit',$LanguageChannels->lang_id)}}" class="btn btn-primary btn-mini">Edit</a>
                                <a href="javascript:" rel="{{$LanguageChannels->lang_id}}" rel1="delete-languageType" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                       
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
                // window.location.href="/admin/"+deleteFunction+"/"+id;  /* local */
                window.location.href=url+"/admin/"+deleteFunction+"/"+id;    /* server */
            });
        });
    </script>
@endsection