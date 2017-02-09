<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
   protected $table = "attributes";

   public function measurements() {

       return $this->belongsTo('App\Measurement');
   }

}
