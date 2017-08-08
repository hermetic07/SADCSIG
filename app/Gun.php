<?php

namespace App;
use App\GunType;
use Illuminate\Database\Eloquent\Model;

class Gun extends Model
{
   protected $table = "tblGuns";
   protected $fillable =  [
    	'strGunID','guntype_id','name','status'
    ];
   public function guntype() {

       return $this->belongsTo('App\GunType');
   }
   protected $primaryKey = 'strGunID';
    public $incrementing = false; 
}
