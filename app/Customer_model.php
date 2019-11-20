<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_model extends Model
{
    protected $table='delivery_address';
    protected $primaryKey='id';
    // protected $fillable=['coupon_code','amount','amount_type','expiry_date','status'];

    public function orders(){
        return $this->belongsTo(Ordersproducts_model::class,'id','customer_id');
    }
}
