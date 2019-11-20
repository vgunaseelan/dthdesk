<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LanguageChannels_model;

class BackendlanguageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menu_active=11;
         $i=0;
         $LanguageChannels=LanguageChannels_model::orderBy('created_at','desc')->get();
         return view('backEnd.languageType.index',compact('menu_active','LanguageChannels','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menu_active=11;
        // $mainpackages=LanguageChannels_model::pluck('pack_name','p_id')->all();
        return view('backEnd.languageType.create',compact('menu_active'));
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
        $this->validate($request,[
            'channel_title'=>'required',
          
        ]);
        $formInput=$request->all();
        LanguageChannels_model::create($formInput);
         return redirect()->route('languageType.create')->with('message','Add channel languageType Successfully!');
        // echo 'hihi';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_active=11;
        $edit_languageType=LanguageChannels_model::findOrFail($id);
        return view('backEnd.languageType.edit',compact('edit_languageType','menu_active'));
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
        // echo $id;
        $this->validate($request,[
            'channel_title'=>'required',          
        ]);
        $update_languageType=LanguageChannels_model::findOrFail($id);
        $formInput=$request->all();
        $update_languageType->update($formInput);
        return redirect()->route('languageType.index')->with('message','Update Channel LanguageType Successfully!');
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
        $delete=LanguageChannels_model::findOrFail($id);
        if($delete->delete()){
            return redirect()->route('languageType.index')->with('message','Delete Success!');       
        }
        else {
            return redirect()->route('languageType.index')->with('message','Could Not be Deleted Success!');  
        }
         

    }
}
