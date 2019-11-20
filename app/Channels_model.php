<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channels_model extends Model
{
    protected $table='pack_channels';
    protected $primaryKey='ch_id';
    protected $fillable=['sub_pack_id','ch_lang_name','ch_image'];

    public function sub_packages(){
        return $this->belongsTo(Subpackages_model::class,'sub_pack_id','sub_id');
    }
   
}
