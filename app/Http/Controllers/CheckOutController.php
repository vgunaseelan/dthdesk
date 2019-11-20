<?php
namespace App\Http\Controllers;

// use Mail;
// use App\Mail\SendMail;
use App\User;
use App\Orders_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer;

class CheckOutController extends Controller
{
    public function index(){
        $countries=DB::table('countries')->get();
        $user_login=User::where('id',Auth::id())->first();
        return view('checkout.index',compact('countries','user_login'));
    }
    public function submitcheckout(Request $request){
       $this->validate($request,[
           'billing_name'=>'required',
           'billing_address'=>'required',
           'billing_city'=>'required',
        //    'billing_email'=>'required',
           'billing_state'=>'required',
           'billing_pincode'=>'required',
           'billing_mobile'=>'required',
           'payment_method'=>'required'
           /* 'shipping_name'=>'required', 

           'shipping_address'=>'required',
           'shipping_city'=>'required',
           'shipping_state'=>'required',
           'shipping_pincode'=>'required',
           'shipping_mobile'=>'required', */
       ]);
        
       


       $cart = Session::get('cart');
       $packages = Session::get('packages');

       if($cart || $packages)
       {

       
        $input_data=$request->all();
        $count_shippingaddress=DB::table('delivery_address')->where('users_id',Auth::id())->count();
        
        $payment_method=$input_data['payment_method'];
        
        // if($count_shippingaddress==1){        
        //     DB::table('delivery_address')->where('users_id',Auth::id())->update([
        //         'name'=>$input_data['billing_name'],
        //         'address'=>$input_data['billing_address'],
        //         'city'=>$input_data['billing_city'],
        //         'state'=>$input_data['billing_state'],
        //         //    'country'=>$input_data['shipping_country'],
        //         'pincode'=>$input_data['billing_pincode'],
        //         'mobile'=>$input_data['billing_mobile']]); 
        //         $data2 = DB::table('orders')->get(); 
        // }
        // else{

            $id = DB::table('delivery_address')->insertGetId([
                    'users_id'=>Auth::id(),
                    'users_email'=>$input_data['billing_email']/* Session::get('frontSession') */,
                    'name'=>$input_data['billing_name'],
                    'address'=>$input_data['billing_address'],
                    'city'=>$input_data['billing_city'],
                    'state'=>$input_data['billing_state'],
                    // 'country'=>$input_data['billing_country'],
                    'pincode'=>$input_data['billing_pincode'],
                    'payment_method'=>$input_data['payment_method'],
                    'mobile'=>$input_data['billing_mobile'],]);
                  
                      
                    // $data=DB::table('delivery_address')->select('id')->first();
                    $cus_id =$id;
                    // if($data==1)
                    // { 
                    if($cart)
                    {

                    
                        foreach($cart as $id => $details)
                        {       
                            // print_r($cus_id);                         
                            DB::table('orders')->insert([
                                'users_id'=>Auth::id(),
                                'customer_id'=>$cus_id,
                                'users_email'=>$input_data['billing_email']/* Session::get('frontSession') */,
                                'product_image'=>$details['image'],
                                'product_name'=>$details['name_product'],
                                'product_price'=>$details['price'],
                                'product_qty'=>$details['quantity'],
                                'subtotal'=>$details['quantity'] * $details['price'],
                                'shipping_charges'=>0,
                                'coupon_code'=>0,
                                'coupon_amount'=>0,
                                'order_status'=>"success",
                                'payment_method'=>$payment_method,
                                
                                ]);
                        }
                    }
                    if($packages)
                    {
                        $packcount = Session::get('packages');
                        $pack_tot = count($packcount); 
                      /* insert packages into tabel */
                        foreach($packages as $id => $details)
                        {       
                            // print_r($cus_id);                         
                            DB::table('orders_package')->insert([
                                'users_id'=>Auth::id(),
                                'customer_id'=>$cus_id,
                                'users_email'=>$input_data['billing_email']/* Session::get('frontSession') */,
                                'product_image'=>$details['image'],
                                'product_name'=>$details['name_package'],
                                'product_price'=>$details['price'],   
                                'shipping_charges'=>0,
                                'order_status'=>"success",
                                'payment_method'=>$payment_method,                                
                                ]);
                        }
                    } 


                    
        // }

            if($payment_method=="pod"){
                $pay_method="Pay On Delivery"; 
                $message          = 'Hello Mail';        
                $mail             = new PHPMailer\PHPMailer(); // create a n
                $mail->IsSMTP();
                // $mail->SMTPDebug  = 2; // debugging: 1 = errors and messages, 2 = messages only/*  it will be use for error chackin */
                $mail->SMTPAuth   = true; // authentication enabled
                $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
                $mail->Host       = "smtp.gmail.com";
                $mail->Port       = 587; // or 587
                $mail->IsHTML(true);
                $mail->Username = "gunaseelan.artdizire@gmail.com";
                $mail->Password = "gunaseelan.v";   
                $mail->SetFrom("account@gmail.com", 'Dthdesk');/* out side name */

                $total = 0;
                $qty = 0;

                $mail->Subject = ucfirst($input_data['billing_name']);
                $mail->Body    = "<h1>Billing Information & Address</h1><hr>
                                    <table rules='all' style='border-color: #666;' cellpadding='10'>
                                    <tr style='background: #eee;'><td><strong>Name:</strong> </td><td>".strip_tags($input_data['billing_name'])."</td></tr>
                                    <tr><td><strong>Email:</strong> </td><td>" . strip_tags($input_data['billing_email']) . "</td></tr>
                                    <tr><td><strong>Phone:</strong> </td><td>" . strip_tags($input_data['billing_mobile']) . "</td></tr>                               
                                    <tr><td><strong>Payment Method:</strong> </td><td>" . strip_tags($pay_method) . "</td></tr> 
                                    </table>
                                    <b>Address:</b><address>".
                                            $input_data['billing_address'].",<br>".
                                            $input_data['billing_city'].",<br>".
                                            $input_data['billing_state'].",<br>".
                                            $input_data['billing_pincode'] .".<br>                            
                                    </address><br>
                                    <h2>Ordering Details</h2><hr>
                                    <table rules='all' style='border-color: #666;' cellpadding='10'>";
                                    if($cart)
                                     { 
                                        foreach($cart as $id => $details)
                                        {
                                            $amt = $details['price'] * $details['quantity'];
                                            $qtycount = $details['quantity'];
                                            $total += $amt;
                                            $qty += $qtycount;

                $mail->Body.="<tr style='background: #eee;'><td><strong>Product Name:</strong> </td><td>".strip_tags($details['name_product'])."</td></tr>
                                    <tr style='background: #eee;'><td><strong>product Price:</strong> </td><td>".strip_tags($details['price'])."</td></tr>
                                    <tr style='background: #eee;'><td><strong>product Quantity:</strong> </td><td>".strip_tags($details['quantity'])."</td></tr>
                                    <tr style='background: #eee;'><td><strong>product Total:</strong> </td><td>".strip_tags($total)."</td></tr><br>";    
                                         }
                                     }

                                     if($packages)
                                     { 
                                        foreach($packages as $id => $details)
                                        {
                                            $amt = $details['price'];                                          
                                            $total += $amt;
                                            

                $mail->Body.="<tr style='background: #eee;'><td><strong>Package Name:</strong> </td><td>".strip_tags($details['name_package'])."</td></tr>
                                    <tr style='background: #eee;'><td><strong>Package Price:</strong> </td><td>".strip_tags($details['price'])."</td></tr>
                                    <br>";    
                                         }
                                     }
                            if($cart)
                            {
                                $mail->Body.="<tr style='background: #eee;'><td><strong>Total Products Quantity:</strong> </td><td>".$qty."</td></tr>";
                            }
                            if($packages)
                            {
                                $mail->Body.="<tr style='background: #eee;'><td><strong>Total Packages :</strong> </td><td>".$pack_tot."</td></tr>";
                            }
                                    
                $mail->Body.= " <tr style='background: #eee;'><td><strong>Sub Total:</strong> </td><td>".$total."</td></tr>
                                <tr style='background: #eee;'><td><strong>Shipping Charges:</strong> </td><td>".'0'."</td></tr>
                                <tr style='background: #eee;'><td><strong>Grand Total:</strong> </td><td>".$total."</td></tr>";    


                $mail->AddAddress($input_data['billing_email'], $input_data['billing_name']); //this is customer address
                
                $mail->AddAddress('vgunaseelan97@gmail.com', "gunaseelan"); //this is admin email 
                if ($mail->Send()) {
                    // return 'Email Sended Successfully';
                    $name = $input_data['billing_email'];
                    $data = [$name,"Email Sent Successfully"];
                    
                    return view('checkout.thanks',compact('data','data'));
                } else {
                    return 'Failed to Send Email';
                }




        }else{
            // echo $payment_method;
               return redirect('/paypal');
        }
        
        /* DB::table('users')->where('id',Auth::id())->update([
            'name'=>$input_data['billing_name'],
            'address'=>$input_data['billing_address'],
            'city'=>$input_data['billing_city'],
            'state'=>$input_data['billing_state'],
            'country'=>$input_data['billing_country'],
            'pincode'=>$input_data['billing_pincode'],
            'mobile'=>$input_data['billing_mobile']]);*/
          
    //     

    }
    else {
        return redirect()->back()->with('message', 'Already your Order Placed!');
    }
    }
    // public function cod(){
    //     $user_order=DB::table('orders')->where('users_id',Auth::id())->first();
    //     // \print_r($user_order->users_email);
    //     // return view('payment.cod',compact('user_order'));
    //     $email = ucfirst($user_order->users_email);
    //     return view('checkout.thanks',compact('email','email'));
    // }
    public function paypal(Request $request){
        $who_buying=DB::table('delivery_address')->where('users_id',Auth::id())->first();
        $email = ucfirst($who_buying->users_email);
       
        return view('payment.paypal',compact('who_buying'));
        // $name = ucfirst($input_data['billing_name']);
        // return view('checkout.thanks',compact('name','name'));
    }
}
