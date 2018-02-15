<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
   protected $table = "areas";

   protected $fillable =  [
    	'id','provices_id','name','status'
    ];

   public function province() {

       return $this->belongsTo('App\Province');
   }

}
