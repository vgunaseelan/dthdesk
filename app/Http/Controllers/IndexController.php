<?php
namespace App\Http\Controllers;
/* PACKAGES */
use App\MainPackages_model;

/* CATEGORY TABLE DATA */
use App\CustomerEnquire_model;
use App\Category_model;
use App\ImageGallery_model;
use App\ProductAtrr_model;
use App\Products_model;
use App\Subpackages_model;
use Illuminate\Http\Request;
use DB;
use PHPMailer\PHPMailer;
class IndexController extends Controller
{
    public function index(){

        $menu_active=1;
        $packages =MainPackages_model::orderBy('created_at','desc')->limit(5)->get();
        $products=Products_model::orderBy('created_at', 'desc')->get();

        return view('frontEnd.index',compact('products','packages','menu_active'));
    }
    public function shop(){
        $products=Products_model::all();
        $byCate="";        
        return view('frontEnd.products',compact('products','byCate'));
    }
    public function listByCat($id){
        $menu_active=$id;
        $list_product=Products_model::where('categories_id',$id)->get();
        $byCate=Category_model::select('name')->where('id',$id)->first();
        return view('frontEnd.products',compact('list_product','byCate','menu_active'));
    }
    public function detialpro($id){
        $detail_product=Products_model::findOrFail($id);
        $imagesGalleries=ImageGallery_model::where('products_id',$id)->get();
        $totalStock=ProductAtrr_model::where('products_id',$id)->sum('stock');
        $add=ProductAtrr_model::where('products_id',$id)->get();
       
        $relateProducts=Products_model::where([['id','!=',$id],['categories_id',$detail_product->categories_id]])->get();
        return view('frontEnd.product_details',compact('detail_product','imagesGalleries','totalStock','add','relateProducts'));
    }


    
    public function getAttrs(Request $request){
        $all_attrs=$request->all();
        $attr=explode('-',$all_attrs['size']);
        $result_select=ProductAtrr_model::where(['products_id'=>$attr[0],'size'=>$attr[1]])->first();
        echo $result_select->price."#".$result_select->stock;
    }


    public function enquire(Request $request){

         $name = $request->cus_name;
         $email = $request->cus_email;
         $phone = $request->cus_phone;
         $pincode = $request->cus_pincode;
         $message = $request->cus_message;

         $data=array('cus_name'=>$name,"cus_email"=>$email,"cus_phone"=>$phone,"cus_pincode"=>$pincode,"cus_message"=>$message);
         $res = DB::table('customer_enquire')->insert($data);
              
        if($res)
        {
            $mail             = new PHPMailer\PHPMailer(); // create a n
            $mail->IsSMTP();
            $mail->SMTPAuth   = true; // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host       = "smtp.gmail.com";
            $mail->Port       = 587; // or 587
            $mail->IsHTML(true);
            $mail->Username = "gunaseelan.artdizire@gmail.com";
            $mail->Password = "gunaseelan.v";   
            $mail->SetFrom("account@gmail.com", 'Product');/* out side name */

            $mail->Subject = "Customer Enquire";
            $mail->Body    = "Name:".$name."<br>
                              Email:".$email."<br>
                              Phone:".$phone."<br>
                              Pincode:".$pincode."<br>
                              Message:".$message."<br>";
            
            $mail->AddAddress("vgunaseelan97@gmail.com", "Admin");

            if ($mail->Send()) {
                echo  '200';
            } else {
                echo '201';
            }
        } 
        
        
        

       
       
    }

    public function subscribe(Request $request){
        $email = $request->sub_email;
        $data=array("sub_email"=>$email);
        $user = DB::table('subscribe')->where('sub_email', '=', $email)->count();
        
        if($user)
        {
            echo '201';
        }
        else {
            $res = DB::table('subscribe')->insert($data);
            echo '200';
        }
        
        // echo '200';
        
    }
    public function channels()
    {
       
        $data = array();
        $products=Subpackages_model::select('sub_id','sub_pack_name')->orderBy('sub_pack_name','desc')->get();
        foreach ($products as $key =>  $value) { 
            $data[]=$value;
        }
         return json_encode($data);
      
    }
   
}