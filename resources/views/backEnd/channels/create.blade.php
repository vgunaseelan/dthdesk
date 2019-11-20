@extends('backEnd.layouts.master')
@section('title','Add Package Channel Page')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="{{route('channels.index')}}">channels</a> <a href="{{route('subpackages.create')}}" class="current">Add Sub Package Channels</a> </div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Add Sub Package Channels</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{route('channels.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="control-group">                    
                        <label class="control-label">Select Sub Package</label>
                        <div class="controls">
                            <select name="sub_pack_id" value="{{old('sub_pack_id')}}" style="width: 415px;">
                                @foreach($subpackages as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>                                   
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="control-group">                    
                        <label class="control-label">Select language Channel</label>
                        <div class="controls">
                            <select name="ch_lang_name" value="{{old('ch_lang_name')}}" style="width: 415px;">
                            @foreach($lang_channels as $lang_channel)
                            <option value="{{$lang_channel->lang_id}}">{{ucfirst($lang_channel->channel_title)}}</option>
                            @endforeach
                               
                            </select>
                        </div>
                    </div>
                   
                                    
                    <div class="control-group">
                        <label class="control-label">Image upload</label>
                        <div class="controls">
                            <input type="file" name="ch_image[]" id="ch_image" required multiple>
                            <span class="text-warning">{{$errors->first('ch_image')}}</span>
                        </div>
                    </div>
                   

                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Add Package Channel</button>
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