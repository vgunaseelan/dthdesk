<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\ProductAtrr_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        $session_id=Session::get('session_id');
        $cart_datas=Cart_model::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->product_price*$cart_data->quantity;
        }
        return view('frontEnd.cart',compact('cart_datas','total_price'))->with('get',"get");
    }

    public function addToCart(Request $request){
        $inputToCart=$request->all();
       /*  echo $inputToCart['quantity'];
        echo"<pre>";
        print_r($inputToCart);
        echo"</pre>"; */
        // Session::forget('discount_amount_price');
        // Session::forget('coupon_code');
      /*   if($inputToCart['size']==""){
            return back()->with('message','Please select Size');
        }else{ */
            $stockAvailable=DB::table('product_att')->select('stock')->where(['products_id'=>$inputToCart['products_id']])->first();
            if($stockAvailable->stock>=$inputToCart['quantity'])
            {
                $email="webmail.com";
                $inputToCart['user_email']=$email;
                $session_id=Session::get('session_id');
                if(empty($session_id)){
                    $session_id=str_random(40);
                    Session::put('session_id',$session_id);
                }
                // echo $inputToCart['products_id'];
                $inputToCart['session_id']=$session_id;
                $product_name= DB::table('cart')->select('product_name')->where(['products_id'=>$inputToCart['products_id'],'session_id'=>$inputToCart['session_id']])->first();
                $count_duplicateItems=Cart_model::where(['products_id'=>$inputToCart['products_id'],'session_id'=>$inputToCart['session_id']])->count();
                // echo $count_duplicateItems;
                if($count_duplicateItems>0){
                    $name=" ";
                    foreach ($product_name as $key => $value) {
                        $name = $value;
                    }
                    echo $name;                    
                    return redirect('viewcart')->with('message',''.$name.'  '.'Product Added already');
                }
                else{
                    DB::table('cart')->insert(
                        array(
                               'products_id'     =>   $inputToCart['products_id'],
                               'product_name'     =>   $inputToCart['product_name'], 
                               'product_price'     =>   $inputToCart['product_price'],  
                               'product_code'     =>   $inputToCart['product_code'], 
                               'quantity'     =>   $inputToCart['quantity'], 
                               'update_price'     =>   $inputToCart['update_price'], 
                               'weight'     =>   $inputToCart['weight'], 
                               'dimensions'     =>   $inputToCart['dimensions'], 
                               'stock'     =>   $inputToCart['stock'], 
                               'user_email'     =>   $inputToCart['user_email'], 
                               'session_id'     =>   $inputToCart['session_id']
                        )
                   );
                    return redirect('viewcart');
                }
            }
            else{
                 return back()->with('message','Stock is not Available!');
            }
        // }
    }
    public function deleteItem($id=null){
        $delete_item=Cart_model::findOrFail($id);
        // Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $delete_item->delete();
        return back()->with('message','Deleted Success!');
    }
    public function updateQuantity($id,$quantity){
        
        // Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        
        $sku_size=DB::table('cart')->select('product_code','weight','quantity','dimensions')->where('id',$id)->first();

        $stockAvailable=DB::table('product_att')->select('stock')->where(['weight'=>$sku_size->weight,
            'dimensions'=>$sku_size->dimensions])->first();


        $updated_quantity=$sku_size->quantity+$quantity;
        // print_r($sku_size);
        // print_r($stockAvailable);
        // print_r($updated_quantity);
        if($stockAvailable->stock>=$updated_quantity){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
            return back()->with('message','Update Quantity already');
        }else{
            return back()->with('message','Stock is not Available!');
        }


    }
}
