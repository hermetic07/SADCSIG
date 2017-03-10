<?php

namespace App;
use App\GunType;
use Illuminate\Database\Eloquent\Model;

class Gun extends Model
{
   protected $table = "Guns";

   public function guntype() {

       return $this->belongsTo('App\GunType');
   }
}
