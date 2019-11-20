<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AddtocartController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('frontEnd.addcart');
       
    }
    public function store(Request $request)
    {   
        $quantity=1;
        if(!empty($_POST['product_quantity']))
        {
            $quantity =$_POST['product_quantity'];
        }
        $id = $_POST['product_id'];
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $image = $_POST['product_image'];
        
        // echo $quantity;
        $cart = Session::get('cart');
        if(isset($cart))
        {
            $pid_array =array_column($cart,"id");

            if(!in_array($id,$pid_array))
            {
                // $count =count($cart);
                // echo $count;
                $cart[]= array(
            
                    "id" => $id,
                    "name_product" => $name,
                    "price" => $price,
                    "image" => $image,
                    "quantity" => $quantity
                ); 
                Session::put('cart', $cart);
                // echo "New Product Successfully Added...('+')";
                $message = "New Product Successfully Added...('+')";

            }
            else {
                {
                    // echo "This Product Already Added...('_')";
                    $message = "This Product Already Added...('_')";
                }
            }
        }
        else {

            $cart[]= array(            
                "id" => $id,
                "name_product" => $name,
                "price" => $price,
                "image" => $image,
                "quantity" => $quantity
            );
            // echo "New Product Successfully Added...('+')";
            $message="Successfully add to cart!";

        }

        Session::put('cart', $cart);
        Session::flash('success',$message);
        
    }

    public function updateCart(Request $cartdata)    
    {
        $quantity =$_POST['product_quantity'];
        $id = $_POST['product_id'];        
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $image = $_POST['product_image'];
              
        $cart = Session::get('cart');
        $pid_array =array_column($cart,"id");
      
        $check= in_array($id,$pid_array);
        if($check)
        {
            foreach ($cart as $id => $val) 
            {
                $cartQty = $cart[$id];
            print_r($cartQty);
                foreach ($cartQty as $key => $value) {

                    $cartkey = $key;                    
                   
                }
                print_r($cartkey);
           
            }
        }
    }

    public function deleteCart($id)
    {
       /*  echo"hello";
        echo "jhdjkfhk"; */ 
       
        $id = $_GET['product_id'];
        
        $cart = Session::get('cart');
        foreach ($cart as $key => $values) {
            if ($values['id']==$id) {
                
                unset($cart [$key]);
                Session::put('cart', $cart);
                // return view('frontEnd.addcart');
                echo 200;
            }
        }   
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
       
    }
}
