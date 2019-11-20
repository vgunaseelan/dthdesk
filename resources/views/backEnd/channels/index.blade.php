@extends('backEnd.layouts.master')
@section('title','List Sub packages')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="{{route('channels.index')}}" class="current">Channels</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List channels</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Channel Name</th>
                        <th>Language Type</th>
                        <th>Under Package</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($channels as $channel)
                        @php  error_reporting(0);                             
                                $str = $channel->ch_image;
                                $channel_name = explode(".",$str,4); 
                                $n++ ;                           
                        @endphp
                        <tr class="gradeC">
                            <td>{{$n}}</td>
                            
                            <?php
                                $img = explode("|",$channel->ch_image);
                                $lang_channels = DB::table('language_channels')->where('lang_id',$channel->ch_lang_name)->get();                                
                            ?>
                            <td style="text-align: center;">
                            <?php for($i=0;$i<=count($img);$i++)
                            {?>
                                <img src="<?php echo asset('channels/large/'.$img[$i]);?> " alt="" >
                           <?php  } ?>
                            </td>    

                            <td style="vertical-align: middle; width:200px;">                            
                            <?php 
                             $l='';
                             $t='';
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
                                         
                            </td>
                        
                            <?php                         
                            foreach ($lang_channels as $key => $value) {

                                echo " <td style='vertical-align: middle;'>".ucwords($value->channel_title)."</td>";
                            }
                            ?> 
                            <td style="vertical-align: middle;">{{$channel->sub_packages->sub_pack_name}}</td>
                            <td style="vertical-align: middle;">
                                <a href="#myModal{{$channel->ch_id}}" data-toggle="modal" class="btn btn-info btn-mini">View</a>
                                <a href="{{route('channels.edit',$channel->ch_id)}}" class="btn btn-primary btn-mini">Edit</a>
                                <a href="javascript:" rel="{{$channel->ch_id}}" rel1="delete-channels" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                        {{--Pop Up Model for View sub_package--}}
                        <div id="myModal{{$channel->ch_id}}" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>
                                <?php
    if(count($img)>1)
    {
       echo"Total channels:".count($img);
    }  

?>
                                </h3>                                                                
                            </div>
                            <div class="modal-body">
                            <?php for($i=0;$i<=count($img);$i++)  
                            {?>
                                <img src="<?php echo asset('channels/large/'.$img[$i]);?> " alt="" >
                                <?php $cut= explode(".",$img[$i],4);                                                                            
                                      echo ucfirst($cut[2]); 
                                
                            } ?>
                                                               
                            </div>
                        </div>
                        
                      
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

            // alert(url+"/admin/"+deleteFunction+"/"+id);
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
                window.location.href=url+"/admin/"+deleteFunction+"/"+id;  /* server */
            });
        });
    </script>
@endsection