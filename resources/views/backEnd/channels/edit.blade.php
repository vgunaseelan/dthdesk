@extends('backEnd.layouts.master')
@section('title','Add Sub Package channel Page')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="{{route('channels.index')}}">Sub Package channels</a> <a href="#" class="current">Edit Sub Package channels</a> </div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Add Sub package channel</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{route('channels.update',$edit_channel->ch_id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{method_field("PUT")}}
                    <div class="control-group">
                        <label class="control-label">Select Sub Package</label>
                        <div class="controls">
                            <select name="sub_pack_id" style="width: 415px;">
                                @foreach($packages as $key=>$value)
                                    <option value="{{$key}}"{{$edit_package->sub_id==$key?' selected':''}}>{{$value}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">                    
                        <label class="control-label">Select language Channel</label>
                        <div class="controls">
                            <select name="ch_lang_name" style="width: 415px;">
                                @foreach($channels as $key=>$value)
                                    <option value="{{$key}}" {{$edit_channel->ch_lang_name==$key?' selected':''}} > {{ucfirst($value)}} </option>                                                                     
                                @endforeach                             
                            </select>
                        </div>
                    </div>
                                  
                    <div class="control-group">
                        <label class="control-label">Image upload</label>
                        <div class="controls">
                            <input type="file" name="ch_image[]" id="ch_image" multiple>
                            <?php  error_reporting(0);
                                $img = explode("|",$edit_channel->ch_image); 
                                 
                                $l='';
                                // print_r($img);
                                if(count($img)>1)
                                {
                                    $l=1;
                                    $t =") ";
                                    $c =", ";
                                }                                 
                                for($p=0;$p<count($img);$p++)
                                {                                            
                                    $cut= explode(".",$img[$p],4); 
                                                                        
                                    echo $l.$t.ucfirst($cut[2])."$c"."&emsp;"; 
                                  
                                    $l++;
                                } 
                            ?>
                            <span class="text-danger">{{$errors->first('ch_image')}}</span>
                              
                            @if($edit_channel->ch_image!='')
                                &nbsp;&nbsp;&nbsp;<br>
                            
                                <a href="javascript:" rel="{{$edit_channel->ch_id}}" rel1="delete-channels-image" class="btn btn-danger btn-mini deleteRecord">Delete Old Image</a>
                                <img src="{{asset('channels/large',$edit_channel->ch_image)}}" width="35" alt="">                                
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Edit Channel</button>
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
                // window.location.href="/admin/"+deleteFunction+"/"+id; /* local */
                window.location.href=url+"/admin/"+deleteFunction+"/"+id; /* server */
            });
        });
        $('.textarea_editor').wysihtml5();
    </script>
@endsection