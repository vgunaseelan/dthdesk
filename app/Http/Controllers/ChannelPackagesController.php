<?php

namespace App\Http\Controllers;

/* PACKAGES */
use App\MainPackages_model;
use App\Subpackages_model;

use Illuminate\Http\Request,Response;
use Illuminate\Support\Facades\Session;

class ChannelPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packages =MainPackages_model::orderBy('created_at','desc')->get();
        $package =MainPackages_model::orderBy('p_id','desc')->first();
        $id =$package->p_id;
        
        $subpackages =Subpackages_model::where('packages_id','=',$id)->get();  /* this is first time show the partcular package items */
        $menu_active=$id;  /* this is show an pacticular package item active */
        return view('frontEnd.channel_packages',compact('packages','subpackages','menu_active'));
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
       
        $id = $_POST['package_id'];
        $name = $_POST['package_name'];
        $price = $_POST['package_price'];
        $image = $_POST['package_image'];
        $month = $_POST['package_month'];
        $desc = $_POST['package_desc'];       
        // print_r($id.$name.$price.$image.$month.$desc);  

        $packages = Session::get('packages');
        if(isset($packages))
        {
            // echo "hello";
            // print_r($packages);
            $pid_array =array_column($packages,"id");

            if(!in_array($id,$pid_array))
            {
                // $count =count($cart);
                // echo $count;
                $packages[]= array(
            
                    "id" => $id,
                    "name_package" => $name,
                    "price" => $price,
                    "image" => $image,
                    "month" =>$month,
                    "desc"=>$desc
                    
                ); 
                print_r($packages);
                Session::put('packages', $packages);
                // echo "New Product Successfully Added...('+')";
                $message = "New Package Successfully Added...('+')";

            }
            else {
                {
                    // echo "This Product Already Added...('_')";
                    $message = "This Package Already Added...('_')";
                }
            }
        }
        else {

            $packages[]= array(            
                "id" => $id,
                "name_package" => $name,
                "price" => $price,
                "image" => $image,
                "month" =>$month,
                "desc"=>$desc
                
            );
            print_r($packages);
            // echo "New Product Successfully Added...('+')";
            $message="Successfully Package Added!";
// echo $message;
        }

        Session::put('packages', $packages);
        Session::flash('success',$message);


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
        // echo $id;
       
        $subpackages =Subpackages_model::where('packages_id','=',$id)->get();
        $menu_active=$id;
        $packages =MainPackages_model::orderBy('created_at','desc')->get();
        return view('frontEnd.channel_packages',compact('subpackages','packages','menu_active'));
        // return view('frontEnd.channel_packages',compact('packages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajax()
    {
        //
        $id = $_POST['id'];
        $menu_active=$id;
        $subpackages =Subpackages_model::where('packages_id','=',$id)->get();
        return Response::json(array(
            'success' => true,
            'data'   => $subpackages
        ));
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
        $id = $_POST['package_id'];
        
        $packages = Session::get('packages');
        foreach ($packages as $key => $values) {
            if ($values['id']==$id) {
                
                unset($packages [$key]);
                Session::put('packages', $packages);
                // return view('frontEnd.addcart');
                echo 200;
            }
        }   
    }
}
