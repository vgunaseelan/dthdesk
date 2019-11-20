<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Cart_model extends Model
{
    protected $table='cart';
    protected $primaryKey='id';
    protected $fillable=['products_id','product_name','product_price','product_code','quantity','update_price','weight',
                         'dimensions','stock','user_email','session_id'];
    // protected $removeable=['created_at','updated_at'];
    // protected $hidden=['created_at','update_at'];
}
