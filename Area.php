<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
   protected $table = "areas";

   public function provinces() {

       return $this->belongsTo('App\Province');
   }

}
