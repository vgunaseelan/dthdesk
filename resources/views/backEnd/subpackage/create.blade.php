@extends('backEnd.layouts.master')
@section('title','Add Sub Packages Page')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="{{route('subpackages.index')}}">Sub Packages</a> <a href="{{route('subpackages.create')}}" class="current">Add Sub Packages</a> </div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Add Sub Packages</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{route('subpackages.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="control-group">                    
                        <label class="control-label">Select Main Package</label>
                        <div class="controls">
                            <select name="packages_id" style="width: 415px;">
                                @foreach($mainpackages as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>                                   
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="sub_pack_name" class="control-label">Sub Package Name</label>
                        <div class="controls{{$errors->has('sub_pack_name')?' has-error':''}}">
                            <input type="text" name="sub_pack_name" id="sub_pack_name" class="form-control" value="{{old('sub_pack_name')}}" title=""  style="width: 400px;">
                            <span class="text-warning">{{$errors->first('sub_pack_name')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="per_month" class="control-label">Per Month</label>
                        <div class="controls{{$errors->has('per_month')?' has-error':''}}">
                            <input type="text" name="per_month" id="per_month" class="form-control" value="{{old('per_month')}}" title=""  style="width: 400px;">
                            <span class="text-warning">{{$errors->first('per_month')}}</span>
                        </div>
                    </div>

                    
                    <div class="control-group">
                        <label for="description" class="control-label">Description</label>
                        <div class="controls{{$errors->has('sub_pack_description')?' has-error':''}}">
                            <textarea class="" name="sub_pack_description" id="sub_pack_description" rows="6"
                                       placeholder="Package Description" style="width: 400px;">{{old('sub_pack_description')}}</textarea>
                            <span class="text-warning">{{$errors->first('sub_pack_description')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="old_price" class="control-label">Old Price</label>
                        <div class="controls{{$errors->has('old_price')?' has-error':''}}">
                            <div class="input-prepend"> <span class="add-on">$</span>
                                <input type="number" name="old_price" id="old_price" class="" value="{{old('old_price')}}" title="" style="width: 380px;>
                                <span class="text-danger">{{$errors->first('old_price')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="new_price" class="control-label">Price</label>
                        <div class="controls{{$errors->has('new_price')?' has-error':''}}">
                            <div class="input-prepend"> <span class="add-on">$</span>
                                <input type="number" name="new_price" id="new_price" class="" value="{{old('new_price')}}" title="" style="width: 380px;>
                                <span class="text-warning">{{$errors->first('new_price')}}</span>
                            </div>
                        </div>
                    </div>                   
                    <div class="control-group">
                        <label class="control-label">Image upload</label>
                        <div class="controls">
                            <input type="file" name="sub_pack_image" id="sub_pack_image"/>
                            <span class="text-warning">{{$errors->first('sub_pack_image')}}</span>
                        </div>
                    </div>
                   

                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Add New Sub Package</button>
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
    <script>
        $('.textarea_editor').wysihtml5();
    </script>
@endsection