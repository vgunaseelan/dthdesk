<?php

namespace App\Http\Controllers;
use App\LanguageChannels_model;
use App\Subpackages_model;
use App\Channels_model;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;

class BackendChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=7;
        $i=0;
        $channels=Channels_model::orderBy('created_at','desc')->get();
        return view('backEnd.channels.index',compact('menu_active','channels','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=7;
        $subpackages=Subpackages_model::pluck('sub_pack_name','sub_id')->all();
        $lang_channels = LanguageChannels_model::orderBy('channel_title','desc')->get();
        return view('backEnd.channels.create',compact('menu_active','subpackages','lang_channels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \error_reporting(0);
        // $this->validate($request,[            
        //     'ch_image'=>'required|image|mimes:png,jpg,jpeg,gif|max:1000',
        // ]);
        $formInput=$request->all();
        if($request->file('ch_image')){
            $image=$request->file('ch_image');
            if($image){
                $images=array();
                    foreach($request->file('ch_image') as $image)
                {
                    $name=time().'.'.$request->ch_lang_name.'.'.$image->getClientOriginalName();
                    // $large_image_path=public_path('channels/large/'.$name);                   
                    $large_image_path=base_path('channels/large/'.$name);   
                    $images[] = $name;
                    
                    Image::make($image)->save($large_image_path);                    
                }
               
            }
        }
        Channels_model::insert( [
            'ch_image'=>  implode("|",$images),
            'sub_pack_id' =>$formInput['sub_pack_id'],
            'ch_lang_name' =>$formInput['ch_lang_name'],
            //you can put other insertion here
        ]);
        // print_r($formInput);
        return redirect()->route('channels.create')->with('message','Add Channel Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {      

        $menu_active=7;
        $packages=Subpackages_model::pluck('sub_pack_name','sub_id')->all();
        $edit_channel=Channels_model::findOrFail($id);

        // echo $edit_channel->ch_lang_name;
        $channels=LanguageChannels_model::pluck('channel_title','lang_id')->all();

        $edit_package=Subpackages_model::findOrFail($edit_channel->sub_pack_id);
        return view('backEnd.channels.edit',compact('edit_channel','menu_active','packages','edit_package','channels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $images=array(); 
        $update_product=Channels_model::findOrFail($id);
       
        $formInput=$request->all();
    //   
            if($request->file('ch_image'))
            { 
               
                $image=$request->file('ch_image');
              
                if($image){                    
                    foreach($request->file('ch_image') as $image)
                    {
                        $name=time().'.'.$request->ch_lang_name.'.'.$image->getClientOriginalName();
                        // $large_image_path=public_path('channels/large/'.$name);
                        $large_image_path=base_path('channels/large/'.$name);
                       
                        $images[] = $name;
                        
                        Image::make($image)->save($large_image_path);                        
                    }                
                }
               

            }
            else {
                
                $images[] = $update_product['ch_image'];
            }
        Channels_model::where('ch_id',$id)->update( [
            'ch_image'=>  implode("|",$images),
            'sub_pack_id' =>$formInput['sub_pack_id'],
            'ch_lang_name' =>$formInput['ch_lang_name'],
            //you can put other insertion here
        ]);
        //    print_r($formInput);
        return redirect()->route('channels.index')->with('message','Update channel Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \error_reporting(0);
        $delete=Channels_model::findOrFail($id);  
        
        if($delete->delete()){
          
            $img = explode("|",$delete->ch_image);
            
            for($i=0;$i<count($img);$i++)
            {
                // $image_large=public_path().'/channels/large/'.$img[$i];               
                $image_large=base_path().'/channels/large/'.$img[$i]; 
                unlink($image_large);
            }
            
           
        }
        return redirect()->route('channels.index')->with('message','Delete Success!');
    }
    public function deleteImage($id){
        $delete_image=Channels_model::findOrFail($id);
        if($delete_image){
            
            
            ////// delete image ///

            $img = explode("|",$delete_image->ch_image);            
            for($i=0;$i<count($img);$i++)
            {
                // $image_large=public_path().'/channels/large/'.$img[$i];              
                $image_large=base_path().'/channels/large/'.$img[$i]; 
                unlink($image_large);
            }
            $delete_image->ch_image='';
            $delete_image->save();
            
        }
        return back();
    }
}
