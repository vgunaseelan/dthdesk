<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer_model;
class BackendCustomerController extends Controller
{
    //
    public function index()
    {
        $menu_active=8;
        $i=0;
        $customer=Customer_model::orderBy('id','desc')->get();
        return view('backEnd.customer.index',compact('menu_active','customer','i'));
    }
   public function create() //customer enquery
   {
    // echo "hello";
    $menu_active=9;
    $i=0;
    $users = DB::table('customer_enquire')->orderBy('cus_id','desc')->get();
    return view('backEnd.customer.contact',compact('menu_active','users','i'));
   }
   
     public function edit($id)
    {
        $product=DB::delete('delete from customer_enquire where cus_id = ?',[$id]);
        return redirect()->route('customers.create')->with('message','Delete Success!');
   
     }

   
   
    public function destroy($id)
    {
        $delete=Customer_model::findOrFail($id);
        
        if($delete->delete()){
            
            $product=DB::delete('delete from orders where customer_id = ?',[$id]);
           
            $package=DB::delete('delete from orders_package where customer_id = ?',[$id]);
           
            return redirect()->route('customers.index')->with('message','Delete Success!');
        }
        // return redirect()->route('customers.index')->with('message','cou Success!');
    } 
    public function subscrib()
    {
        
        $menu_active=10;
        $i=0;
        $subscrib = DB::table('subscribe')->orderBy('sub_id','desc')->get();
        return view('backEnd.customer.subscrib',compact('menu_active','subscrib','i'));
    }
    
    public function deletesubscrib($id)
    {
        $product=DB::delete('delete from subscribe where sub_id = ?',[$id]);
        return redirect()->back()->with('message','Delete Success!');
       
    }
}
