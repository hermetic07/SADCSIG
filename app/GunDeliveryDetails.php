<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GunDeliveryDetails extends Model
{
    protected $fillable =  [
    	'id','gun_delivery_id','gun_id','qtyOrdered','quantity'
    ];
}
