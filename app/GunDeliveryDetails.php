<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GunDeliveryDetails extends Model
{
	protected $table = "tblGunDeliveryDetails";
    protected $fillable =  [
    	'strGunDeliveryDetailsID','strGunDeliveryID','strGunID','qtyOrdered','quantity'
    ];
    protected $primaryKey = 'strGunDeliveryDetailsID';
    public $incrementing = false; 
}
