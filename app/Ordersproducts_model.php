<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordersproducts_model extends Model
{
    protected $table='orders';
    protected $primaryKey='id';
    // protected $fillable=['categories_id','p_name','description','old_price','price','image','p_code','p_color','p_weight','p_dimensions'];

    // public function category(){
    //     return $this->belongsTo(Category_model::class,'categories_id','id');
    // }
    // public function attributes(){
    //     return $this->hasMany(ProductAtrr_model::class,'products_id','id');
    // }
}
