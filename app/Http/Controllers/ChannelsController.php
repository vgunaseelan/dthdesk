<?php

namespace App\Http\Controllers;


// use App\MainPackages_model;
use App\Channels_model;
use App\Subpackages_model;
use Illuminate\Http\Request;
use DB;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //  $subpackages =Channels_model::where('packages_id','=',$id)->get();
        // $menu_active=$id;
        // $packages =MainPackages_model::orderBy('created_at','desc')->get();
        return view('frontEnd.channels');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            // echo $id;
        // //
        // $subpackages =MainPackages_model::orderBy('created_at','desc')->get();
        $channels =Channels_model::where('sub_pack_id','=',$id)->get();
        $sub_packages = Subpackages_model::where('sub_id','=',$id)->get();
        $groupchannels =DB::table('pack_channels')->where('sub_pack_id',$id)->get();
        // print_r(count($groupchannels));
        // foreach ($groupchannels as $key => $value) {
        //     # code...
        // print_r($value);
        // }
          /* this is first time show the partcular package items */
        // $menu_active=$id;  /* this is show an pacticular package item active */
        // print_r($sub_packages->sub_pack_name);
        // foreach ($sub_packages as $key => $value) {
        //     # code...
        //     echo $value->sub_pack_name;
        //     echo $value->per_month;
        //     echo $value->sub_pack_description;
        //     echo $value->new_price;
        // }
        // echo "<pre>";
        // print_r($groupchannels);
        // // echo "</pre>";
        return view('frontEnd.channels',compact('channels','sub_packages','groupchannels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
