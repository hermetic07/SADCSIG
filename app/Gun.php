<?php

namespace App;
use App\GunType;
use Illuminate\Database\Eloquent\Model;

class Gun extends Model
{
   protected $table = "guns";
   protected $fillable =  [
    	'id','guntype_id','name','status'
    ];
   public function guntype() {

       return $this->belongsTo('App\GunType');
   }
   // protected $primaryKey = 'id';
   //  public $incrementing = false; 
}
