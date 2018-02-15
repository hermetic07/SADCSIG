<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
   protected $table = "provinces";

   protected $fillable =  [
    	'id','name','status'
    ];

   public function area() {
        return $this->hasMany('App\Area');
    }
}
