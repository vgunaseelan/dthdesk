<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\MainPackages_model;
use Image;

use Illuminate\Http\Request;

class BackendPackagesController extends Controller
{
       
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $menu_active=5;
            $i=0;
            $packages=MainPackages_model::orderBy('created_at','desc')->get();
            return view('backEnd.Packages.index',compact('menu_active','packages','i'));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $menu_active=5;
            // $categories=Category_model::where('parent_id',0)->pluck('name','id')->all();
            return view('backEnd.Packages.create',compact('menu_active'));
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $this->validate($request,[
                'pack_name'=>'required',            
                // 'pack_description'=>'required',               
                'pack_image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
            ]);

            $formInput=$request->all();
            if($request->file('pack_image')){
                $image=$request->file('pack_image');
                if($image->isValid()){
                    $fileName=time().'-'.str_slug($formInput['pack_name'],"-").'.'.$image->getClientOriginalExtension();
                    $large_image_path=base_path('mainpackages/large/'.$fileName);
                    $medium_image_path=base_path('mainpackages/medium/'.$fileName);
                    $small_image_path=base_path('mainpackages/small/'.$fileName);
                    //Resize Image
                    Image::make($image)->save($large_image_path);
                    Image::make($image)->resize(600,600)->save($medium_image_path);
                    Image::make($image)->resize(300,300)->save($small_image_path);
                    $formInput['pack_image']=$fileName;
                }
            }
            MainPackages_model::create($formInput);
            return redirect()->route('Packages.create')->with('message','Add Main Packages Successfully!');
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
            $menu_active=5;            
            $edit_package=MainPackages_model::findOrFail($id);
            return view('backEnd.Packages.edit',compact('edit_package','menu_active'));
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
            $update_package=MainPackages_model::findOrFail($id);
            $this->validate($request,[
                'pack_name'=>'required',            
                // 'pack_description'=>'required',               
                // 'pack_image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
            ]);
            $formInput=$request->all();
            if($update_package['pack_image']==''){
                if($request->file('pack_image')){
                    $image=$request->file('pack_image');
                    if($image->isValid()){
                        $fileName=time().'-'.str_slug($formInput['pack_name'],"-").'.'.$image->getClientOriginalExtension();
                        $large_image_path=base_path('mainpackages/large/'.$fileName);
                        $medium_image_path=base_path('mainpackages/medium/'.$fileName);
                        $small_image_path=base_path('mainpackages/small/'.$fileName);
                        //Resize Image
                        Image::make($image)->save($large_image_path);
                        Image::make($image)->resize(600,600)->save($medium_image_path);
                        Image::make($image)->resize(300,300)->save($small_image_path);
                        $formInput['pack_image']=$fileName;
                    }
                }
            }else{
                $formInput['pack_image']=$update_package['pack_image'];
            }
            $update_package->update($formInput);
            return redirect()->route('Packages.index')->with('message','Update Package Successfully!');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $delete=MainPackages_model::findOrFail($id);
            $image_large=base_path().'/mainpackages/large/'.$delete->pack_image;
            $image_medium=base_path().'/mainpackages/medium/'.$delete->pack_image;
            $image_small=base_path().'/mainpackages/small/'.$delete->pack_image;
            if($delete->delete()){
                unlink($image_large);
                unlink($image_medium);
                unlink($image_small);
            }
            return redirect()->route('packages.index')->with('message','Delete Success!');
        }
        public function deleteImage($id){
            echo $id;
            //Products_model::where(['id'=>$id])->update(['image'=>'']);
            $delete_image=MainPackages_model::findOrFail($id);
            $image_large=base_path().'/mainpackages/large/'.$delete_image->pack_image;
            $image_medium=base_path().'/mainpackages/medium/'.$delete_image->pack_image;
            $image_small=base_path().'/mainpackages/small/'.$delete_image->pack_image;
            if($delete_image){
                $delete_image->pack_image='';
                $delete_image->save();
                ////// delete image ///
                unlink($image_large);
                unlink($image_medium);
                unlink($image_small);
            }
            return back();
        }
    
    


}
