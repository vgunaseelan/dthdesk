<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerEnquire_model extends Model
{
    //
    protected $table='customer_enquire';
    protected $primaryKey='cus_id';
    protected $fillable=['cus_name','cus_email','cus_phone','cus_pincode','cus_message'];
}
