<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainPackages_model extends Model
{
    protected $table='packages';
    protected $primaryKey='p_id';
    protected $fillable=['pack_name','pack_image','pack_description'];

    // public function category(){
    //     return $this->belongsTo(Category_model::class,'categories_id','id');
    // }
    // public function attributes(){
    //     return $this->hasMany(ProductAtrr_model::class,'products_id','id');
    // }
}
