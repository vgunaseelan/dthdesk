@extends('backEnd.layouts.master')
@section('title','Add Products Page')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('packages.index')}}">Packages</a> <a href="#" class="current">Edit Package</a> </div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Add Main Packages</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{route('packages.update',$edit_package->p_id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{method_field("PUT")}}                    
                    <div class="control-group">
                        <label for="pack_name" class="control-label">Package Name</label>
                        <div class="controls{{$errors->has('pack_name')?' has-error':''}}">
                            <input type="text" name="pack_name" id="pack_name" class="form-control" value="{{$edit_package->pack_name}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('pack_name')}}</span>
                        </div>
                    </div> 
                    <div class="control-group">
                        <label for="pack_description" class="control-label">Description</label>
                        <div class="controls{{$errors->has('pack_description')?' has-error':''}}">
                            <textarea class="textarea_editor span12" name="pack_description" id="pack_description" rows="6" placeholder="Package Description" style="width: 580px;">{{$edit_package->pack_description}}</textarea>
                            <span class="text-danger">{{$errors->first('pack_description')}}</span>
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label">Image upload</label>
                        <div class="controls">
                            <input type="file" name="pack_image" id="pack_image"/>
                            <span class="text-danger">{{$errors->first('pack_image')}}</span>
                            @if($edit_package->pack_image!='')
                                &nbsp;&nbsp;&nbsp;
                                <a href="javascript:" rel="{{$edit_package->p_id}}" rel1="deletepackage-image" class="btn btn-danger btn-mini deleteRecord">Delete Old Image</a>
                                <img src="{{url('mainpackages/small/',$edit_package->pack_image)}}" width="35" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Edit Package</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{asset('js/jquery.toggle.buttons.js')}}"></script>
    <script src="{{asset('js/masked.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.form_common.js')}}"></script>
    <script src="{{asset('js/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{asset('js/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-wysihtml5.js')}}"></script>
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
                window.location.href=url+"/admin/"+deleteFunction+"/"+id;  /* server */
            });
        });
        $('.textarea_editor').wysihtml5();
    </script>
@endsection