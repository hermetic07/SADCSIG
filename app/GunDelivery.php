<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GunDelivery extends Model
{
	protected $table = "tblGunDeliveries";
    protected $fillable =  [
    	'strGunDeliveryID','strGunReqID','status','dateTimeReceived','deliveryPerson','deliveryPersonContact'
    ];
    protected $primaryKey = 'strGunDeliveryID';
    public $incrementing = false; 
}
