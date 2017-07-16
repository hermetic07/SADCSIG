<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GunDelivery extends Model
{
    protected $fillable =  [
    	'id','gun_request_id','status','dateTimeReceived'
    ];
}
