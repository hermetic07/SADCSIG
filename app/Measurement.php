<?php

namespace App;
use App\Attribute;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
   protected $table = "measurements";

   public function attributes() {

       return $this->belongsTo('App\Attribute');
   }
}
