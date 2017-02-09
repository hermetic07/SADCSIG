<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Military;
class Rank extends Model
{
   protected $table = "ranks";

   public function military_services() {

       return $this->belongsTo('App\Military');
   }

}
