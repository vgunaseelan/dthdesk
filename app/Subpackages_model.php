<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subpackages_model extends Model
{
    protected $table='sub_packages';
    protected $primaryKey='sub_id';
    protected $fillable=['packages_id','sub_pack_name','per_month','sub_pack_description','old_price','new_price','sub_pack_image'];
    
    public function packages(){
        return $this->belongsTo(MainPackages_model::class,'packages_id','p_id');
    }
    
}
