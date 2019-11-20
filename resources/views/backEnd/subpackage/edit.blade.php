@extends('backEnd.layouts.master')
@section('title','Add Sub Packages Page')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="{{route('subpackages.index')}}">Sub Packages</a> <a href="#" class="current">Edit Sub Packages</a> </div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Add New Sub packages</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{route('subpackages.update',$edit_sub_packages->sub_id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{method_field("PUT")}}
                    <div class="control-group">
                        <label class="control-label">Select Main Packages</label>
                        <div class="controls">
                            <select name="packages_id" style="width: 415px;">
                                @foreach($mainpackages as $key=>$value)
                                    <option value="{{$key}}"{{$edit_main_packages_category->p_id==$key?' selected':''}}>{{$value}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="sub_pack_name" class="control-label">Sub Package Name</label>
                        <div class="controls{{$errors->has('sub_pack_name')?' has-error':''}}">
                            <input type="text" name="sub_pack_name" id="sub_pack_name" class="form-control" value="{{$edit_sub_packages->sub_pack_name}}" title=""  style="width: 400px;">
                            <span class="text-danger">{{$errors->first('sub_pack_name')}}</span>
                        </div>
                    </div> 

                    <div class="control-group">
                        <label for="per_month" class="control-label">Per Month</label>
                        <div class="controls{{$errors->has('per_month')?' has-error':''}}">
                            <input type="text" name="per_month" id="per_month" class="form-control" value="{{$edit_sub_packages->per_month}}" title=""  style="width: 400px;">
                            <span class="text-warning">{{$errors->first('per_month')}}</span>
                        </div>
                    </div>


                    <div class="control-group">
                        <label for="sub_pack_description" class="control-label">Description</label>
                        <div class="controls{{$errors->has('sub_pack_description')?' has-error':''}}">
                            <textarea class="textarea_editor span12" name="sub_pack_description" id="sub_pack_description" rows="6" placeholder="Packages Description" style="width: 580px;">
                                     {{$edit_sub_packages->sub_pack_description}}</textarea>
                            <span class="text-danger">{{$errors->first('sub_pack_description')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="old_price" class="control-label">Old Price</label>
                        <div class="controls{{$errors->has('price')?' has-error':''}}">
                            <div class="input-prepend"> <span class="add-on">$</span>
                                <input type="number" name="old_price" id="old_price" class="" value="{{$edit_sub_packages->old_price}}" title="" >
                                <span class="text-danger">{{$errors->first('old_price')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="new_price" class="control-label">Price</label>
                        <div class="controls{{$errors->has('new_price')?' has-error':''}}">
                            <div class="input-prepend"> <span class="add-on">$</span>
                                <input type="number" name="new_price" id="new_price" class="" value="{{$edit_sub_packages->new_price}}" title="" >
                                <span class="text-danger">{{$errors->first('new_price')}}</span>
                            </div>
                        </div>
                    </div>                   
                    <div class="control-group">
                        <label class="control-label">Image upload</label>
                        <div class="controls">
                            <input type="file" name="sub_pack_image" id="sub_pack_image"/>
                            <span class="text-danger">{{$errors->first('sub_pack_image')}}</span>
                            @if($edit_sub_packages->sub_pack_image!='')
                                &nbsp;&nbsp;&nbsp;
                                <a href="javascript:" rel="{{$edit_sub_packages->sub_id}}" rel1="delete-image" class="btn btn-danger btn-mini deleteRecord">Delete Old Image</a>
                                <img src="{{url('mainpackages/subpackages/small',$edit_sub_packages->sub_pack_image)}}" width="35" alt="">                                
                            @endif
                        
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Edit Sub Packages</button>
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
                window.location.href=url+"/admin/"+deleteFunction+"/"+id;   /* server */
            });
        });
        $('.textarea_editor').wysihtml5();
    </script>
@endsection