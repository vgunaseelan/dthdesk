<?php

namespace App\Http\Controllers;

use App\MainPackages_model;
use App\Subpackages_model;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;

class BackendSubpackagesController extends Controller
{
     public function index()
     {
         $menu_active=6;
         $i=0;
         $sub_packages=Subpackages_model::orderBy('created_at','desc')->get();
         return view('backEnd.subpackage.index',compact('menu_active','sub_packages','i'));
     }
 
     public function create()
     {
         $menu_active=6;
         $mainpackages=MainPackages_model::pluck('pack_name','p_id')->all();
         return view('backEnd.subpackage.create',compact('menu_active','mainpackages'));
     }
 
     public function store(Request $request)
     {
         $this->validate($request,[
             'sub_pack_name'=>'required',
             'per_month'=>'required',              
             'sub_pack_description'=>'required',
             'new_price'=>'required|numeric',
             'sub_pack_image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
         ]);
         $formInput=$request->all();
         if($request->file('sub_pack_image')){
             $image=$request->file('sub_pack_image');
             if($image->isValid()){
                 $fileName=time().'-'.str_slug($formInput['sub_pack_name'],"-").'.'.$image->getClientOriginalExtension();
                 $large_image_path=base_path('mainpackages/subpackages/large/'.$fileName);
                 $medium_image_path=base_path('mainpackages/subpackages/medium/'.$fileName);
                 $small_image_path=base_path('mainpackages/subpackages/small/'.$fileName);
                 //Resize Image
                 Image::make($image)->save($large_image_path);
                 Image::make($image)->resize(600,600)->save($medium_image_path);
                 Image::make($image)->resize(300,300)->save($small_image_path);
                 $formInput['sub_pack_image']=$fileName;
             }
         }
         Subpackages_model::create($formInput);
         return redirect()->route('subpackages.create')->with('message','Add Sub Package Successfully!');
     }
 
     public function show($id)
     {
     }
 
     public function edit($id)
     {
         $menu_active=6;
         $mainpackages=MainPackages_model::pluck('pack_name','p_id')->all();

         $edit_sub_packages=Subpackages_model::findOrFail($id);
         $edit_main_packages_category=MainPackages_model::findOrFail($edit_sub_packages->packages_id);
         return view('backEnd.subpackage.edit',compact('edit_sub_packages','menu_active','mainpackages','edit_main_packages_category'));
     }
 
     public function update(Request $request, $id)
     {
         $update_product=Subpackages_model::findOrFail($id);
         $this->validate($request,[
            'sub_pack_name'=>'required',
            'per_month'=>'required',              
            'sub_pack_description'=>'required',
            'new_price'=>'required|numeric',
            // 'sub_pack_image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
         ]);
         $formInput=$request->all();
         if($update_product['sub_pack_image']==''){
             if($request->file('sub_pack_image')){
                 $image=$request->file('sub_pack_image');
                 if($image->isValid()){
                     $fileName=time().'-'.str_slug($formInput['sub_pack_name'],"-").'.'.$image->getClientOriginalExtension();
                     $large_image_path=base_path('mainpackages/subpackages/large/'.$fileName);
                     $medium_image_path=base_path('mainpackages/subpackages/medium/'.$fileName);
                     $small_image_path=base_path('mainpackages/subpackages/small/'.$fileName);
                     //Resize Image
                     Image::make($image)->save($large_image_path);
                     Image::make($image)->resize(600,600)->save($medium_image_path);
                     Image::make($image)->resize(300,300)->save($small_image_path);
                     $formInput['sub_pack_image']=$fileName;
                 }
             }
         }else{
             $formInput['sub_pack_image']=$update_product['sub_pack_image'];
         }
         $update_product->update($formInput);
        //  echo "dhfjkdhfk";
         return redirect()->route('subpackages.index')->with('message','Update Sub Packages Successfully!');
        //  return redirect()->route('packages.index')->with('message','Update Package Successfully!');
     }
 
     public function destroy($id)
     {
         $delete=Subpackages_model::findOrFail($id);
         $image_large=base_path().'/mainpackages/subpackages/large/'.$delete->sub_pack_image;
         $image_medium=base_path().'/mainpackages/subpackages/medium/'.$delete->sub_pack_image;
         $image_small=base_path().'/mainpackages/subpackages/small/'.$delete->sub_pack_image;
         if($delete->delete()){
             unlink($image_large);
             unlink($image_medium);
             unlink($image_small);
         }
         return redirect()->route('subpackages.index')->with('message','Delete Success!');
     }
     public function deleteImage($id){
         //Products_model::where(['id'=>$id])->update(['image'=>'']);
         $delete_image=Subpackages_model::findOrFail($id);
         $image_large=base_path().'/mainpackages/subpackages/large/'.$delete_image->sub_pack_image;
         $image_medium=base_path().'/mainpackages/subpackages/medium/'.$delete_image->sub_pack_image;
         $image_small=base_path().'/mainpackages/subpackages/small/'.$delete_image->sub_pack_image;
         if($delete_image){
             $delete_image->sub_pack_image='';
             $delete_image->save();
             ////// delete image ///
             unlink($image_large);
             unlink($image_medium);
             unlink($image_small);
         }
         return back();
     }
}
