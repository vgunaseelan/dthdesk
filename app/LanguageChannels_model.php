<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageChannels_model extends Model
{
    protected $table='language_channels';
    protected $primaryKey='lang_id';
    protected $fillable=['channel_title'];

    // public function sub_packages(){
        // return $this->belongsTo(Subpackages_model::class,'sub_pack_id','sub_id');
    // }
   
}
